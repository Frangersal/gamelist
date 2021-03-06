<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- {{ config('app.name', 'GameList') }} -->
    <title>
    GameList
    </title>
        <!--  Jquery -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" /> -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/r/bs-3.3.5/jq-2.1.4,dt-1.10.8/datatables.min.css"/> -->
            <!-- development version, includes helpful console warnings -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <!-- Librerias, bootstrap, jquery, datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

        <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script src="https://cdn.datatables.net/r/bs-3.3.5/jqc-1.11.3,dt-1.10.8/datatables.min.js"></script>

        <!-- carousel -->
        <script src="{{ asset('js/carousel.js') }}"></script>
        <script src="{{ asset('js/carouselCards.js') }}"></script>
    
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/gamelist.css') }}" rel="stylesheet">
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

        <!-- Vue -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

        <!-- Vue y carusel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script> 
        <script src="https://cdn.rawgit.com/SSENSE/vue-carousel/6823411d/dist/vue-carousel.min.js"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-dark  shadow-sm navbar-expand-md  bg-azul-negro ">
            <!-- navbar-light -->
            <div class=" row container">

                <div class="row">
                <div class=" col-4">
                    <a class="navbar-brand" href="{{ url('/') }}">
                    GameList
                        <!-- {{ config('app.name', 'GameList') }} -->
                    </a>
                </div>
                 <!-- serch shit start mb-3-->

                <div class="input-group col-4 centrado ">
                    <input type="text" class="form-control " placeholder="Buscar...">
                    <div class="input-group-append">
                        <button class="btn btn-amarillo-verde" type="submit">Buscar</button>
                    </div>
                </div>

                <div class=" col-4">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
</div>
                
               
                
                <!-- serch shit end -->

                <div class="collapse navbar-collapse col-3" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar-sesion') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>

                                    
                                    @can('admin-users')
                                    <a class = "dropdown-item" href="{{ route('admin.users.index') }}">
                                        Administrar Usuarios
                                    </a>
                                    @endcan 

                                    
                                    <a class = "dropdown-item" href="{{ route('user.plataforms.index') }}">
                                        Administrar Plataforms
                                    </a>
                                    
                                    <a class = "dropdown-item" href="{{ route('user.Genders.index') }}">
                                        Administrar Generos
                                    </a>

                                    <a class = "dropdown-item" href="{{ route('user.Games.index') }}">
                                        Administrar Juegos
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    </div>
                <!-- </div> -->
            </div>
        </nav>

        <main class="py-4  bg-azul-secundario">
            @yield('content')
        </main>
    </div>
</body>
</html>
