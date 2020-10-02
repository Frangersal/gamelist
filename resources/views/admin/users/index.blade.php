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
        

            <!-- Titulos -->

            <!-- tabla -->
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

                                    @can('admin-users')
                                    <a href="{{ route('admin.users.edit', $user->id) }}">
                                        <button type="button" class="btn btn-warning">Editar</button>
                                    </a>
                                    @endcan  

                                    @can('admin-users')
                                    <a href="{{ route('admin.users.destroy', $user->id) }}">
                                    <button type="button" class="btn btn-danger">Eliminar</button>
                                    </a>
                                    @endcan                                        

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>

        <div class="col-1 bg-azul-secundario" > </div>

    </div>
</div>
@endsection