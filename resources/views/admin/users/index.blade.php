@extends('layouts.app')
@section('content')
<div class="content">
    
    <div class="row">

        <div class="col-2 bg-azul-secundario " > </div>

        <div class="col-8 bg-azul-primario">
            
            <!-- Titulo -->
        
            <div class="bg-amarillo-verde">
                <h4> {{ Auth::user()->name }} </h4> 
            </div>

            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nick</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">E-Mail</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Accion</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->nick }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ implode(', ',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">

                                    <!-- Tutorial laravel crud ajax -->

                                    @can('admin-users')
                                        <a href="javascript:void(0)"  
                                        data-id="{{ $user->id }}" 
                                        onclick="editUser(event.target)" 
                                        class="btn btn-info">
                                            <!-- <button type="button" class="btn btn-warning">Editar</button> -->
                                            Editar
                                        </a>
                                    @endcan 

                                    @can('admin-users')
                                        <a href="javascript:void(0)" 
                                        data-id="{{ $user->id }}" 
                                        class="btn btn-danger" 
                                        onclick="deleteUser(event.target)">
                                            <!-- <button type="button" class="btn btn-danger">Eliminar</button> -->
                                            Eliminar
                                        </a>
                                    @endcan 
                                    <!--  -->

                                    <!-- @can('admin-users')
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <button type="button" class="btn btn-warning">Editar</button>
                                    </a>
                                    @endcan  

                                    @can('admin-users')
                                    <a href="{{ route('admin.users.destroy', $user->id) }}">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                    @endcan                                         -->

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        

            <!-- tabla -->
            <!-- <div id="listauser"> 
            
            </div> -->

        </div>

        <div class="col-1 bg-azul-secundario" > </div>

    </div>

    <!-- MODEL DIALOG ------------------  -->

    <div class="modal fade" id="post-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <form name="userForm" class="form-horizontal">
                    <input type="hidden" name="post_id" id="post_id">
                    <!-- Name -->
                    <div class="form-group">
                            <label for="name" class="col-sm-2">name</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                                <span id="nameError" class="alert-message"></span>
                            </div>
                        </div>
                        <!-- Nick -->
                        <div class="form-group">
                            <label for="nick" class="col-sm-2">nick</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="nick" name="nick" placeholder="Enter nick">
                                <span id="nickError" class="alert-message"></span>
                            </div>
                        </div>
                        <!-- E-Mail -->
                        <div class="form-group">
                            <label for="email" class="col-sm-2">email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                                <span id="emailError" class="alert-message"></span>
                            </div>
                        </div>
                        <!-- Picture -->
                        <div class="form-group">
                            <label for="picture" class="col-sm-2">picture</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="picture" name="picture" placeholder="Enter picture">
                                <span id="pictureError" class="alert-message"></span>
                            </div>
                        </div>
                        <!-- Roles -->
                        <div class="form-group">
                            <label for="roles" class="col-sm-2">role</label>
                            <div class="col-sm-12">
                            @csrf
                                {{ method_field('PUT') }}
                                @foreach($roles as $role)
                                    <div class="form-check">
                                        <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                                        @if($user->roles->pluck('id')->contains($role->id)) checked @endif>

                                        <label>{{$role->name }} </label>
                                    </div>
                                @endforeach 
                                    <button type="submit" class="btn btn-success">Actualizar</button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="createPost()">Save</button>
                </div>
            </div>
        </div>
    </div>    

</div>




<script>
  $('#laravel_crud').DataTable();

  function addUser() {
    $("#user_id").val('');
    $('#post-modal').modal('show');
  }

  function editUser(event) {
    var id  = $(event).data("id");
    let _url = `/users/${id}`;
    $('#nameError').text('');
    $('#nickError').text('');
    $('#emailError').text('');
    $('#titleError').text('');
    
    $.ajax({
      url: _url,
      type: "GET",
      success: function(response) {
          if(response) {
            $("#user_id").val(response.id);
            $("#name").val(response.title);
            $("#nick").val(response.description);
            $("#email").val(response.title);
            $("#roles").val(response.title);
            
            $('#user-modal').modal('show');
          }
      }
    });
  }

  function createUser() {
    var name = $('#name').val();
    var nick = $('#nick').val();
    var email = $('#email').val();
    var roles = $('#roles').val();

    var id = $('#user_id').val();

    let _url     = `/users`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: "POST",
        data: {
          id: id,
          name: name,
          nick: nick,
          email: email,
          roles: roles,
          _token: _token
        },
        success: function(response) {
            if(response.code == 200) {
              if(id != ""){
                $("#row_"+id+" td:nth-child(2)").html(response.data.name);
                $("#row_"+id+" td:nth-child(3)").html(response.data.nick);
                $("#row_"+id+" td:nth-child(2)").html(response.data.email);
                $("#row_"+id+" td:nth-child(3)").html(response.data.roles);
              } else {
                $('table tbody').prepend('<tr id="row_'+response.data.id+'"><td>'+response.data.id+'</td><td>'+response.data.name+'</td><td>'+response.data.nick+'</td><td>'+response.data.email+'</td><td>'+response.data.roles+'</td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" onclick="editPost(event.target)"class="btn btn-info">Edit</a></td><td><a href="javascript:void(0)" data-id="'+response.data.id+'" class="btn btn-danger" onclick="deletePost(event.target)">Delete</a></td></tr>');
              }
              $('#name').val('');
              $('#nick').val('');
              $('#email').val('');
              $('#roles').val('');

              $('#post-modal').modal('hide');
            }
        },
        error: function(response) {
          $('#nameError').text(response.responseJSON.errors.name);
          $('#nickError').text(response.responseJSON.errors.nick);
          $('#emailError').text(response.responseJSON.errors.email);
          $('#rolesError').text(response.responseJSON.errors.roles);
        }
      });
  }

  function deleteUser(event) {
    var id  = $(event).data("id");
    let _url = `/users/${id}`;
    let _token   = $('meta[name="csrf-token"]').attr('content');

      $.ajax({
        url: _url,
        type: 'DELETE',
        data: {
          _token: _token
        },
        success: function(response) {
          $("#row_"+id).remove();
        }
      });
  }

</script>

@endsection