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

            <!-- tabla -->
            <div class="card text-white bg-dark mb-3" > <!-- style="max-width: 18rem;" -->
                <div class="card-header"><h4> Editar usuario </h4> </div>
                <div class="card-body">
                    <h5 class="card-title">Editar usuario</h5>

                    <form action ="{{ route('admin.users.update', $user)}}" method="POST">
                    
                        <!-- >>>--- Name input ---<<< -->
                        <div class="form-group row">
                            <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- >>>--- Nick input ---<<< -->
                        <div class="form-group row">
                            <label for="nick" class="col-md-2 col-form-label text-md-right">Nick</label>

                            <div class="col-md-6">
                                <input id="nick" type="text" class="form-control @error('nick') is-invalid @enderror" name="nick" value="{{ $user->nick }}" required autocomplete="nick" autofocus>

                                @error('nick')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- >>>--- E-Mail input ---<<< -->
                        <div class="form-group row">
                            <label for="email" class="col-md-2 col-form-label text-md-right">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- >>>--- Picture input ---<<< -->
                        <div class="form-group row">
                            <label for="picture" class="col-md-2 col-form-label text-md-right">Picture</label>

                            <div class="col-md-6">
                                <input id="picture" type="text" class="form-control @error('picture') is-invalid @enderror" name="picture" value="{{ $user->picture }}" required autocomplete="picture" autofocus>

                                @error('picture')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- >>>--- Roles input ---<<< -->
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
                    </form>
                    

                </div>
            </div>




        </div>

        <div class="col-1 bg-azul-secundario" > </div>

    </div>
</div>
@endsection