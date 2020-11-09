<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Pokemon</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="{{ asset('inicio') }}">Home</a></li>
          <li><a href="{{ asset('buscador') }}">Buscador</a></li>
          <li><a href="{{ asset('logout') }}">Salir</a></li>
        </ul>
      </div>
    </nav>
    <div class="col-md-12">
        <div class="col-md-4">
        
        </div>
        <div class="col-md-4">
            <center><img src="{{asset('Archivos/pokemon.png')}}" style="width: 300px;height: 250px;padding:20px;"></center>
        </div>
        <div class="col-md-4">
            
        </div>  
    </div>
    
    <div class="col-md-12">
        <div class="col-md-4">
        
        </div>
        <div class="col-md-4">
            <form>
                <div class="input-group">
                  <input type="text" class="form-control" id="entradafilter" placeholder="Search">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            
        </div>  
    </div>
    <br>
    <br>
    <br>
    <div class="col-md-2">
        
    </div>
    <div class="col-md-8" style="padding: 20px;">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Url</th>
              </tr>
            </thead>
            <tbody class="contenidobusqueda">
              @foreach($posts as $post)
              <tr>
              <td>{{ $post -> name }}</td>
              <td>{{ $post -> url }}</td>
              
              </tr>
              @endforeach
            </tbody>
          </table>
    </div>
    <div class="col-md-2">
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script>
    
      
      $(document).ready(function () {
      $('#entradafilter').keyup(function () {
         var rex = new RegExp($(this).val(), 'i');
           $('.contenidobusqueda tr').hide();
           $('.contenidobusqueda tr').filter(function () {
               return rex.test($(this).text());
           }).show();
   
           })
   
   });
         
     </script> 
  </body>
</html>