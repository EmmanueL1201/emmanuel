@include('header')
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  @include('navbar')
  @include('menu')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8">

          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">Registro de Visitas</h3>
            </div>
            <div class="card-body">
              <form  id="dynamic_form" method="POST" enctype='multipart/form-data'>
                {{csrf_field()}} 
              <span id="result"></span>
             <table class="table table-bordered table-striped" id="user_table" >
                

               <thead>
                   <tr>
                       <th>Hoteles</th>
                       <th>Visitas</th>
                       <th>Acciones</th>
                   </tr>
               </thead>
               <tbody>
                   
               </tbody>
               <tfoot>
                   <tr>
                       <td colspan="2" align="right">&nbsp;

                       </td>
                       <td>
                         <input type="submit" name="guardar" id="guardar" class="btn btn-primary" value="Guardar" />
                       </td>
                   </tr>
               </tfoot>        
             </table>
            
              </form>
              <!-- /.form group -->

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-2">
        </div>   
        
        <!-- /.col (right) -->
      </div>
    <!-- /.content -->
  </div>
  <script>
      $(document).ready(function(){
          var count = 1;
          dynamic_field(count);

          function dynamic_field(number){

            var html = '<tr>';
                html += '<td><select name="hoteles[]" class="form-control"><option value="1">Concorde</option><option value="2">Quinta del rey</option><option value="3">Aeropuerto</option></select></td>';
                html += '<td><input type="number" name="visitas[]" class="form-control" /></td>';
               
                
            if(number > 1)
            {
               html+= '<td><button type="button" name="remove" id="remove" class="btn btn-danger">Eliminar</button</td></tr>';
               $('tbody').append(html);
            }
            else
            {
                html+= '<td><button type="button" name="add" id="add" class="btn btn-success">Agregar</button</td></tr>';
                    $('tbody').html(html);
            }
        }
        
        $('#add').click(function(){
            count++;
            dynamic_field(count);
        });

        $(document).on('click', '#remove', function(){
            count--;
            dynamic_field(count);

        });

        $('#dynamic_form').on('submit', function(event){
           event.preventDefault();
           $.ajax({
               url:'actualizarVisitas',
               method: 'post',
               data:$(this).serialize(),
               dataType: 'json',
               beforeSend:function(){
                   $('#guardar').attr('disabled','disabled');
               },
               success:function(data){
                   if(data.error)
                   {
                       var error_html = '';
                       for(var count = 0; count < data.error.length;
                           count++)
                           {
                               error_html += '<p>' + data.error[count] + '</p>'
                           }
                           $('#result').html('<div class="alert alert-danger">' + error_html + '</div>');
                   }
                   else
                   {
                       dynamic_field(1);
                       $('#result').html('<div class="alert alert-success">' + data.success + '</div>');
                   }
                   $('#guardar').attr('disabled',false);
               }

           })
        })

      })
  </script>    
  {{-- <script>
      $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
         });
      $(document).ready(function(){
          var i = 1;
        $('#nuevo').click(function(){
            i++;
            $('#dinamica').append('<tr id="row'+i+'"><td><select class="form-control select2" name="hoteles[]" id="hoteles" style="width: 100%;" name_list><option selected="selected">Hoteles</option><option>Alaska</option><option>California</option><option>Delaware</option></select></td><td><input type="button" name="remove" id="'+i+'" class="btn btn-danger btn-remove" value="Eliminar"></tr>');
        });
        $(document).on('click','.btn-remove', function(){
            var button_id = $(this).attr("id");
            $('#row'+button_id+'').remove();
        });
        $('#submit').click(function(){
            console.log('entra');
            $.ajax({
                url : '{{route("actualizarVisitas")}}',
                method: 'POST',
                data: $('#agregar').serialize(),
                success: function(data)
                {
                    alert(data);
                    console.log('listo');
                    $('#agregar')[0].reset();
                }

            });
        });
      });
  </script> --}}
  @include('footer')