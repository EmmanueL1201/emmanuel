<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Visitas; 
use App\Hoteles; 
use App\Http\Controllers\principalController;
use DB;
use Session;

class VisitasController extends Controller
{
    public function visitas(){
        $hoteles = DB::table('hoteles')
        ->select('id_hotel','nombre')
         ->get();
        return view('visitas')->with(['hoteles'=>$hoteles]);
    }

    public function actualizarVisitas(Request $request){
        $idus=session()->get('session_id');
        
        
     if($request->ajax())
     {
         $rules = array(
             'hoteles.*' => 'required',
             'visitas.*' => 'required'
         );
         $error = Validator::make($request->all(), $rules);
         if($error->fails())
         {
             return response()->json([
                 'error' => $error->errors()->all()
             ]);
         } 

         $hoteles = $request->hoteles;
         $visitas = $request->visitas;
      
         
         for($count = 0; $count < count($hoteles); $count++)
         {
             $data = array(
                  'id_hotel' => $hoteles[$count],
                  'numero_visita' => $visitas[$count],
                
             );
             $insert_data[] = $data;
         }
         
      
    
           
         foreach ($insert_data as $valor) {
            $id = $valor['id_hotel'];
            $numero_visita = $valor['numero_visita'];
            $visitas=new Visitas;
            $visitas->id_hotel=$id;
            $visitas->id_usuario= $idus;
            $visitas->numero_visita=$numero_visita;
            $visitas->activo= 1;
       
           $visitas->save();
             
        }
     
         return response()->json([
             'success' => 'Data agregado correctamente'
         ]);
     }
    }
}
