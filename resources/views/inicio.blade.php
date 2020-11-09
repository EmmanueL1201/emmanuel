@include('header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('navbar')
  @include('menu')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Usuarios</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a href="{{ asset('visitas') }}"><li class="breadcrumb-item"><button class="btn btn-success"> <i class="far fa-plus nav-icon"></i>Visita</button></li></a>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>A.Paterno</th>
                    <th>A.Materno</th>
                    <th>Acciones</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($usuario as $us)    
                        <tr>
                        <td>{{ $us->nombre }}</td>
                        <td>{{ $us->ap_paterno }}</td>
                        <td>{{ $us->ap_materno }}</td>
                          <td><center><button class="btn btn-primary" data-toggle="modal" data-target="#myModal{{$us->id}}"> <i class="far fa-eye nav-icon"></i>Perfil</button></center></td>
                          
                        </tr>
<!-- Modal -->
<div id="myModal{{$us->id}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Perfil{{$us->id}}</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="thumbnail">
              <img src="{{asset('Archivos/user.jpg')}}" style="width: 200px;height:150px;">
              <div class="caption">
                <h3> <p>{{ $us->nombre }} {{ $us->ap_paterno}} {{ $us->ap_materno }}</p></h3>
               
             
              </div>
            </div>
          </div>
        </div>
        <div class="list-group">
          <a href="#" class="list-group-item active">
            Hoteles visitados
          </a>
          @foreach($resultado as $res)
          @if($us->id == $res->id_usuario)
          <a href="#" class="list-group-item">Nombre: {{$res->nombre_h}} <br> No.Visitas: {{$res->numero_visita}}</a>
          @endif
          @endforeach
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

                  @endforeach
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  @include('footer')