<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <link rel="stylesheet" href="css/estilos.css">

    <title>Modulo Cambio de Filtros</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cambios de Filtros</a>
        </li>
     
        
      </ul>
     
    </div>
  </div>
</nav>


    <div class="container fondo">

        <h1 class="text-center">Modulo Cambios de Filtros</h1>
        <h1 class="text-center">Lista de Cambios de Filtros</h1>

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
                        <i class="bi bi-plus-circle-fill"></i> Crear
                        </button>
                </div>
            </div>
        </div>
        <br />
        <br />

        <div class="table-responsive">
            <table id="datos_usuario" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Direccion instalacion</th>
                        <th>Historial</th>
                        <th>Fecha ultimo cambio</th>
                        <th>Fecha proximo cambio</th>

                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </div>
   </div>


<!-- Modal -->
<div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
     
        <form method="POST" id="formulario" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-body">

            
             
                
                <label for="cliente">Seleccione el Cliente</label>
                <select class="form-select" name="cliente" id="cliente" aria-label="Default select example">
                <option selected id="cliente">Seleccionar</option>
                <?php
                  //$mysqli = new mysqli('localhost', 'root', '', 'crud_usuarios');
                  //$query = $mysqli -> query ("SELECT * FROM usuarios");
                  //while ($valores = mysqli_fetch_array($query)) {
                  //echo '<option id="cliente" value="'.$valores[id].'">'.$valores[nombre].' '.$valores[apellidos].' Telefono1: '.$valores[telefono].' Telefono2: '.$valores[telefono2].'</option>';
                    //}
                 ?>
                 </select>
                   <br>

                    <label for="direccion_instalacion">Ingrese la direccion de instalacion</label>
                    <textarea name="direccion_instalacion" id="direccion_instalacion" cols="30" rows="10"></textarea>
                    <br />
                    <label for="historial">Ingrese el historial de la instalacion</label>
                    <textarea name="historial" id="historial" cols="30" rows="10"></textarea>
                    <br />
                    <label for="fecha_ultimo_cambio">Ingrese la fecha de la ultima instalacion</label>
                    <input type="date" name="fecha_ultimo_cambio" id="fecha_ultimo_cambio" class="form-control">
                    <br />
                    <label for="fecha_proximo_cambio">Ingrese la fecha de la proxima instalacion</label>
                    <input type="date" name="fecha_proximo_cambio" id="fecha_proximo_cambio" class="form-control">
                    <br />

                </div>

                <div class="modal-footer">
                    <input type="hidden" name="id_usuario" id="id_usuario">
                    <input type="hidden" name="operacion" id="operacion">             
                    <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
                </div>
            </div>
        </form>
      </div>     
  </div>
</div>

    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#botonCrear").click(function(){
                $("#formulario")[0].reset();
                $(".modal-title").text("Crear Usuario");
                $("#action").val("Crear");
                $("#operacion").val("Crear");
               
            });
            
            var dataTable = $('#datos_usuario').DataTable({
                "processing":true,
                "serverSide":true,
                "order":[],
                "ajax":{
                    url: "obtener_registros_filtros.php",
                    type: "POST"
                },
                "columnsDefs":[
                    {
                    "targets":[0, 3, 4],
                    "orderable":false,
                    },
                ],
                "language": {
                "decimal": "",
                "emptyTable": "No hay registros",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            }
            });
            
            //Aquí código inserción
            $(document).on('submit', '#formulario', function(event){
            event.preventDefault();
         
            var direccion_instalacion = $('#direccion_instalacion').val();
            var historial = $('#historial').val();
            var fecha_ultimo_cambio = $('#fecha_ultimo_cambio').val();
            var fecha_proximo_cambio = $('#fecha_proximo_cambio').val();
        
            	
		    
              
                    $.ajax({
                        url:"crear-filtros.php",
                        method:'POST',
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        success:function(data)
                        {
                            alert(data);
                            $('#formulario')[0].reset();
                            $('#modalUsuario').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
             
               
	        });

            //Funcionalida de editar
            $(document).on('click', '.editar', function(){		
            var id_usuario = $(this).attr("id");		
            $.ajax({
                url:"obtener_registro_filtros.php",
                method:"POST",
                data:{id_usuario:id_usuario},
                dataType:"json",
                success:function(data)
                    {
                        //console.log(data);				
                        $('#modalUsuario').modal('show');
                        $('#cliente').val(data.cliente);
                        $('#direccion_instalacion').val(data.direccion_instalacion);
                        $('#historial').val(data.historial);
                        $('#fecha_ultimo_cambio').val(data.fecha_ultimo_cambio);
                        $('#fecha_proximo_cambio').val(data.fecha_proximo_cambio);
            
                        $('.modal-title').text("Editar Usuario");
                        $('#id_usuario').val(id_usuario);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                    }
                })
	        });

            //Funcionalida de borrar
            $(document).on('click', '.borrar', function(){
                var id_usuario = $(this).attr("id");
                if(confirm("Esta seguro de borrar este registro:" + id_usuario))
                {
                    $.ajax({
                        url:"borrar-filtros.php",
                        method:"POST",
                        data:{id_usuario:id_usuario},
                        success:function(data)
                        {
                            alert(data);
                            dataTable.ajax.reload();
                        }
                    });
                }
                else
                {
                    return false;	
                }
            });

        });         
    </script>
    
  </body>
</html>