<?php

namespace App\Http\Controllers;
use Auth;	
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Usuarios; 
use Validator;
use Session;
use redirect;
use DB;
use Hash;

class principalController extends Controller
{
    public function index(){
        $client = new Client([
            // Base URI is used with relative requests
            'base_uri' => 'https://pokeapi.co/api/v2/',
            // You can set any number of default request options.
            'timeout'  => 2.0,
        ]);
        
        $response = $client->request('GET', 'pokemon');
        
        $posts1 = json_decode($response->getBody()->getContents());
        $posts2 = array($posts1->results);
        $posts= $posts2[0];
          return view('buscador')->with(['posts'=>$posts]);
    }

    public function login(){
        return view('login');
    } 

   
    public function valida(Request $request){
		$correo= $request ->input('correo');
		$password= $request ->input('password');
	    

		$consulta= Usuarios::where('correo','=',$correo)
        ->get();
        
        if (count($consulta)==0 or $consulta[0]->activo=='0') 
        {
            $notificacion = array(
                'message' => 'Usuario no existe o está inactivo.',
                'alert-type' => 'error');
        
            return redirect()->back()->with($notificacion);
            
		}

        else
        {
            $user = Usuarios::where('correo', '=', $correo)->first();
           
            if (Hash::check($request ->input('password'), $user->contrasena)) 
            {
                    $request->session()->put('session_id', $consulta[0]->id);
                    $request->session()->put('session_nombre', $consulta[0]->nombre);
                

                    $session_id = $request->session()->get('session_id');
                    $session_nombre = $request->session()->get('session_nombre');
                    $resultado = \DB::table('usuarios')
                    ->join('visitas','usuarios.id','=','visitas.id_usuario')
                    ->join('hoteles','hoteles.id_hotel','=','visitas.id_hotel')
                    ->select('usuarios.nombre as nombre',
                    'usuarios.ap_paterno as ap_paterno',
                    'usuarios.ap_materno as ap_materno',
                    'hoteles.nombre as nombre_h',
                    'visitas.numero_visita as numero_visita',
                    'visitas.id_usuario as id_usuario')
                    ->get();
                
                    $resultado_usuario= \DB::table('usuarios')
                                ->select('id','nombre','ap_paterno','ap_materno')
                                ->where('activo',1)
                                ->get();

                    return view('inicio')->with(['usuario'=>$resultado_usuario])->with(['resultado'=>$resultado]);

        
            }
            else
            {
                    $notificacion = array(
                                    'message' => 'contraseña incorrecta.',
                                    'alert-type' => 'error');
                
                    return redirect()->back()->with($notificacion);

            }

        }
   }

    public function registrate()
	{
		        return view ('registrate');
    }

    public function inicio()
	{
                $resultado = \DB::table('usuarios')
                ->join('visitas','usuarios.id','=','visitas.id_usuario')
                ->join('hoteles','hoteles.id_hotel','=','visitas.id_hotel')
                ->select('usuarios.nombre as nombre',
                'usuarios.ap_paterno as ap_paterno',
                'usuarios.ap_materno as ap_materno',
                'hoteles.nombre as nombre_h',
                'visitas.numero_visita as numero_visita',
                'visitas.id_usuario as id_usuario')
                ->get();

                $resultado_usuario= \DB::table('usuarios')
                                ->select('id','nombre','ap_paterno','ap_materno')
                                ->where('activo',1)
                                ->get();

                return view('inicio')->with(['usuario'=>$resultado_usuario])->with(['resultado'=>$resultado]);

    }
    
    public function guardaregistro(Request $request)
    {
                $this->validate($request, [
                    'g-recaptcha-response' => 'required',
                    ]);
                $nombre = $request->nombre;
                $ap_paterno = $request->ap_paterno;
                $ap_materno = $request->ap_materno;
                $correo = $request->correo;
                $contrasena = $request->contrasena;
                $activo = $request->activo;
                $existe = \DB::table('usuarios')
                            ->select('correo')
                            ->where('correo',$correo)
                            ->get();
        
            if(count($existe)>0)
            {
                    $notificacion = array(
                                    'message' => 'Ese correo ya esta registrado',
                                    'alert-type' => 'error');
                    return redirect()->back()->with($notificacion);
            }
 
                $usuarios=new Usuarios;
                $usuarios->nombre=$request->nombre;
                $usuarios->ap_paterno=$request->ap_paterno;
                $usuarios->ap_materno=$request->ap_materno;
                $usuarios->correo=$request->correo;
                $usuarios->contrasena=Hash::make($contrasena);
                $usuarios->activo=$request->activo;
                $usuarios->save();
                $notificacion = array(
                                'message' => 'Registro exitoso!',
                                'alert-type' => 'success');
                return redirect()->back()->with($notificacion);
 
     }
    
    public function logout(Request $request) 
    {
                
    
                $id	= $request->session()->forget('session_id');
                $nombre = $request->session()->forget('session_nombre');
            
                $guarda =session()->save();
                    
                $notificacion = array(
                'message' => 'Sesion cerrada con éxito',
                'alert-type' => 'error');

                return view('login')->with($notificacion);		
    }
    
    
}
