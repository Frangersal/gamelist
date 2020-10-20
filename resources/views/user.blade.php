@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 Crud operation using ajax(Real Programmer)</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Librerias, bootstrap, jquery, datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <h1>Laravel 8 Crud with Ajax</h1>
    <!-- Boton de Crear -->
    <a class="btn btn-success" href="javascript:void(0)" id="createNewUser"> Create New User</a>
    <table class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Nick</th>
                <th>Name</th>
                <th>Email</th>
                <!-- <th>Password</th> -->
                <th>Picture</th>
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
                <form id="userForm" name="userForm" class="form-horizontal">
                   <input type="hidden" name="user_id" id="user_id">

                   <div class="form-group">
                        <label for="nick" class="col-sm-2 control-label">Nick</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nick" name="nick" placeholder="Ingresar Nick" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingresar Name" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ingresar Email" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Ingresar Password" value="" maxlength="50" required="">
                        </div>
                    </div>
     
                    <div class="form-group">
                        <label for="picture" class="col-sm-2 control-label">Picture</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="picture" name="picture" placeholder="Ingresar Picture" value="" maxlength="50" required="">
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
            ajax: "{{ route('users.index') }}",
            columns: [

                {data: 'nick', name: 'nick'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                // {data: 'password', name: 'password'},
                {data: 'picture', name: 'picture'},

                {data: 'action', name: 'action', orderable: false, searchable: false},
            ]
        });

        //  Boton de Crear <<<---
        $('#createNewUser').click(function () {
            $('#saveBtn').val("create-user");
            $('#user_id').val('');
            $('#userForm').trigger("reset");
            $('#modelHeading').html("Create New User");
            $('#ajaxModel').modal('show');
        });

        //  Boton de Guardar <<<---
        $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Save');
        
            $.ajax({
                data: $('#userForm').serialize(),
                url: "{{ route('users.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#userForm').trigger("reset");
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
        $('body').on('click', '.editUser', function () {
            var user_id = $(this).data('id'); //Obtener id del libro
            $.get("{{ route('users.index') }}" +'/' + user_id +'/edit', function (data) {
                $('#modelHeading').html("Edit User"); 
                $('#saveBtn').val("edit-user"); 
                $('#ajaxModel').modal('show');
                $('#user_id').val(data.id);

                $('#nick').val(data.nick);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#password').val(data.password);
                $('#picture').val(data.picture);

            })
    });

        //  Boton de Eliminar
        $('body').on('click', '.deleteUser', function () {
        
            var user_id = $(this).data("id");
            confirm("Are You sure want to delete !");
        
            $.ajax({
                type: "DELETE",
                url: "{{ route('users.store') }}"+'/'+user_id,
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
</body>
</html>

@endsection