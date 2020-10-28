@extends('layouts.app')
@section('content')
<div class="content">
    
    <div class="row">

        <div class="col-2 bg-azul-secundario " > </div>

        <div class="col-8 bg-blanco">
    
            <div class="container">
                <h1>Administrador de Plataformas de juego</h1>
                <!-- Boton de Crear -->
                <a class="btn btn-success" href="javascript:void(0)" id="createNewPlataform"> Crear Plataforma</a>
                <hr>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>image</th>
                            <th width="300px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <!-- ->> Aqui comienza los componentes asincronos <<- -->
            <div class="modal fade" id="ajaxModel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modelHeading"></h4>
                        </div>
                        <div class="modal-body">
                        <!-- Formulario para crear registro -->
                            <form id="plataformForm" name="plataformForm" class="form-horizontal">
                            <input type="hidden" name="plataform_id" id="plataform_id">

                
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar Name" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="description" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Ingresar Description" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="image" class="col-sm-2 control-label">image</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="image" name="image" placeholder="Ingresar image" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                
                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar cambios
                                </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <div class="col-2 bg-azul-secundario " > </div>

    </div>
</div>
    
    <!-- Javascript librerias -->
    <!-- Jquery, validate, datatables, bootstrap,  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>  

<script type="text/javascript">

    $(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.plataforms.index') }}",
            columns: [


                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'image', name: 'image'},

                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        //  Boton de Crear <<<---
        $('#createNewPlataform').click(function () {
            $('#saveBtn').val("create-plataform");
            $('#plataform_id').val('');
            $('#plataformForm').trigger("reset");
            $('#modelHeading').html("Create New Plataform");
            $('#ajaxModel').modal('show');
        });

        //  Boton de Guardar <<<---
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
        
            $.ajax({
                data: $('#plataformForm').serialize(),
                url: "{{ route('user.plataforms.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#plataformForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
            
        });

        //  Boton de Editar <<<---
        $('body').on('click', '.editPlataform', function () {
            var plataform_id = $(this).data('id'); //Obtener id del libro
            $.get("{{ route('user.plataforms.index') }}" +'/' + plataform_id +'/edit', function (data) {
                $('#modelHeading').html("Edit Plataform"); 
                $('#saveBtn').val("edit-plataform"); 
                $('#ajaxModel').modal('show');
                $('#plataform').val(data.id);

                $('#name').val(data.name);
                $('#description').val(data.description);
                $('#image').val(data.image);

            })
    });

        //  Boton de Eliminar
        $('body').on('click', '.deletePlataform', function () {
        
            var plataform_id = $(this).data("id");
            confirm("Are You sure want to delete !");
        
            $.ajax({
                type: "DELETE",
                url: "{{ route('user.plataforms.store') }}"+'/'+plataform_id,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
        
    });
</script>

@endsection