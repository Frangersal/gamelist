@extends('layouts.app')
@section('content')
<div class="content">
    
    <div class="row">

        <!-- <div class="col-1 bg-azul-secundario " > </div> -->

        <div class="col-12 bg-blanco">
    
            <div class="container">
                <h1>Administrador de Juegos</h1>
                <!-- Boton de Crear -->
                <a class="btn btn-success" href="javascript:void(0)" id="createNewGame"> Crear Gameo</a>
                <hr>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>

                            <th>name</th>
                            <th>serie</th>
                            <th>gender</th>

                            <th>plataform</th>
                            <th>dev.</th>
                            <th>publ.</th>

                            <th>dir.</th>
                            <th>productor</th>
                            <th>F Laz</th>
                            <th>admin v</th>

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
                            <form id="gameForm" name="gameForm" class="form-horizontal">
                            <input type="hidden" name="game_id" id="game_id">                        
                
                                <div class="form-group">
                                    <label for="name" class="col-sm-2 control-label">name</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar Name" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="serie" class="col-sm-2 control-label">serie</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="serie" name="serie" placeholder="Ingresar serie" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="gender" class="col-sm-2 control-label">gender</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="gender" id="gender" value="" maxlength="50" required="">
                                            @foreach($genders as $gender)
                                                <option value="{{ $gender->name }}">{{ $gender->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="plataform" class="col-sm-2 control-label">plataform</label>
                                    <div class="col-sm-12">
                                        <select class="form-control" name="plataform" id="plataform" value="" maxlength="50" required="">
                                            @foreach($plataforms as $plataform)
                                                <option value="{{ $plataform->name }}">{{ $plataform->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="developer" class="col-sm-2 control-label">developer</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="developer" name="developer" placeholder="Ingresar developer" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="publisher" class="col-sm-2 control-label">publisher</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="publisher" name="publisher" placeholder="Ingresar publisher" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="director" class="col-sm-2 control-label">director</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="director" name="director" placeholder="Ingresar director" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="productor" class="col-sm-2 control-label">productor</label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" id="productor" name="productor" placeholder="Ingresar productor" value="" maxlength="50" required="">
                                    </div>
                                </div>
                
                                <div class="form-group">
                                    <label for="release_date" class="col-sm-2 control-label">release date</label>
                                    <div class="col-sm-12">
                                        <input type="date" class="form-control" id="release_date" name="release_date" placeholder="Ingresar release_date" value="" maxlength="50" required="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="admin_verification" class="col-sm-2 control-label">admin v</label>
                                    <div class="col-sm-12">
                                        <select  class="form-control" name="admin_verification" id="admin_verification" value="" maxlength="50" required="">
                                            <option value="1">Si</option>
                                            <option value="0">No</option>
                                        </select>
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
        
        <!-- <div class="col-1 bg-azul-secundario " > </div> -->

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
        ajax: "{{ route('user.Games.index') }}",
        columns: [
            

            {data: 'name', name: 'name'},
            {data: 'serie', name: 'serie'},
            {data: 'gender', name: 'gender'},

            {data: 'plataform', name: 'plataform'},
            {data: 'developer', name: 'developer'},
            {data: 'publisher', name: 'publisher'},

            {data: 'director', name: 'director'},
            {data: 'productor', name: 'productor'},
            {data: 'release_date', name: 'release_date'},

            {data: 'admin_verification', name: 'admin_verification'},

            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    //  Boton de Crear <<<---
    $('#createNewGame').click(function () {
        $('#saveBtn').val("create-game");
        $('#game_id').val('');
        $('#gameForm').trigger("reset");
        $('#modelHeading').html("Create New Game");
        $('#ajaxModel').modal('show');
    });

    //  Boton de Guardar <<<---
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');
    
        $.ajax({
            data: $('#gameForm').serialize(),
            url: "{{ route('user.Games.store') }}",
            type: "POST",
            dataType: 'json',
            success: function (data) {
                $('#gameForm').trigger("reset");
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
    $('body').on('click', '.editGame', function () {
        var game_id = $(this).data('id'); //Obtener id del libro
        $.get("{{ route('user.Games.index') }}" +'/' + game_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Game"); 
            $('#saveBtn').val("edit-game"); 
            $('#ajaxModel').modal('show');
            $('#game_id').val(data.id);

            $('#name').val(data.name);
            $('#serie').val(data.serie);
            $('#gender').val(data.gender);

            $('#plataform').val(data.plataform);
            $('#developer').val(data.developer);
            $('#publisher').val(data.publisher);
            
            $('#director').val(data.director);
            $('#productor').val(data.productor);
            $('#release_date').val(data.release_date);
            
            $('#admin_verification').val(data.admin_verification);

        })
    });

    //  Boton de Eliminar
    $('body').on('click', '.deleteGame', function () {
    
        var game_id = $(this).data("id");
        confirm("Are You sure want to delete !");
    
        $.ajax({
            type: "DELETE",
            url: "{{ route('user.Games.store') }}"+'/'+game_id,
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