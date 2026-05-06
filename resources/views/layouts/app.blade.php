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
    <div class="d-flex flex-column min-vh-100">
        <!-- NAVBAR ESTILO IMDB -->
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm" style="background-color: #07101c;">
            <div class="container">
                
                <!-- Logo -->
                <a class="navbar-brand font-weight-bold" style="color: #ffc107;" href="{{ url('/') }}">
                    <span style="background-color: #ffc107; color: #000; padding: 2px 6px; border-radius: 4px; margin-right: 2px;">Game</span>List
                </a>

                <!-- Botón Mobile -->
                <button class="navbar-toggler border-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenido Navbar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                    <!-- Buscador Central -->
                    <form class="form-inline mx-auto my-2 my-lg-0 w-50">
                        <div class="input-group w-100">
                            <input type="text" class="form-control border-0" placeholder="Buscar juegos, géneros, plataformas..." aria-label="Buscar" style="background-color: #1a365d; color: white;">
                            <div class="input-group-append">
                                <button class="btn" type="submit" style="background-color: #ffc107; color: #000;">
                                    <span class="font-weight-bold">Buscar</span>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Links Derecha -->
                    <ul class="navbar-nav ml-auto align-items-center">
                        <li class="nav-item mr-3 d-none d-lg-block"><!--
                            <a class="nav-link font-weight-bold text-white d-flex align-items-center" href="#">
                            
                            <span class="mr-1" style="font-size: 1.1rem;">➕</span> Mi GameList

                            </a>-->
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-white font-weight-bold" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item border-left border-secondary ml-2 pl-2 d-none d-md-block">
                                    <a class="nav-link text-white font-weight-bold" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right shadow border-0" style="background-color: #1a365d;" aria-labelledby="navbarDropdown">
                                    
                                    @can('admin-users')
                                    <a class="dropdown-item text-white pb-2 mb-2" href="{{ route('admin.users.index') }}" style="border-bottom: 1px solid #2b4c7e;">
                                        Administrar Usuarios
                                    </a>
                                    @endcan 
                                    
                                    <a class="dropdown-item text-white" href="{{ route('user.plataforms.index') }}">Administrar Plataformas</a>
                                    <a class="dropdown-item text-white" href="{{ route('user.Genders.index') }}">Administrar Géneros</a>
                                    <a class="dropdown-item text-white" href="{{ route('user.Games.index') }}">Administrar Juegos</a>

                                    <div class="dropdown-divider border-secondary"></div>

                                    <a class="dropdown-item text-warning font-weight-bold" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- MAIN CONTAINER -->
        <main class="py-4 flex-grow-1" style="background-color: #0b1a2e;">
            @yield('content')
        </main>

        <!-- FOOTER UNIVERSAL ESTILO IMDB -->
        <footer class="pt-5 pb-4 mt-auto" style="background-color: #07101c; color: white; border-top: 2px solid #1a365d;">
            <div class="container">
                <div class="row mb-4">
                    <!-- Logo y Descripción -->
                    <div class="col-md-4 mb-4 mb-md-0 text-center text-md-left">
                        <a class="navbar-brand font-weight-bold mx-0" style="color: #ffc107; font-size: 1.5rem;" href="{{ url('/') }}">
                            <span style="background-color: #ffc107; color: #000; padding: 2px 6px; border-radius: 4px; margin-right: 2px;">Game</span>List
                        </a>
                        <p class="text-muted mt-3 mb-0" style="font-size: 0.9rem;">
                            La base de datos definitiva para buscar, calificar y encontrar los mejores videojuegos. Lleva tu registro como un profesional.
                        </p>
                    </div>
                    
                    <!-- Enlaces Rápidos -->
                    <div class="col-md-5 mb-4 mb-md-0 d-flex justify-content-center justify-content-md-start">
                        <div class="mr-5">
                            <h6 class="text-warning font-weight-bold mb-3">Descubrir</h6>
                            <ul class="list-unstyled" style="font-size: 0.9rem;">
                                <li class="mb-2"><a href="#" class="text-light text-decoration-none hover-warning">Nuevos Lanzamientos</a></li>
                                <li class="mb-2"><a href="#" class="text-light text-decoration-none hover-warning">Juegos Populares</a></li>
                                <li class="mb-2"><a href="#" class="text-light text-decoration-none hover-warning">Mejor Valorados</a></li>
                                <li class="mb-2"><a href="#" class="text-light text-decoration-none hover-warning">Por Plataforma</a></li>
                            </ul>
                        </div>
                        <div>
                            <h6 class="text-warning font-weight-bold mb-3">Comunidad</h6>
                            <ul class="list-unstyled" style="font-size: 0.9rem;">
                                <li class="mb-2"><a href="#" class="text-light text-decoration-none hover-warning">Acerca de Nosotros</a></li>
                                <li class="mb-2"><a href="#" class="text-light text-decoration-none hover-warning">Noticias (Blog)</a></li>
                                <li class="mb-2"><a href="#" class="text-light text-decoration-none hover-warning">Contacto</a></li>
                                <li class="mb-2"><a href="#" class="text-light text-decoration-none hover-warning">Reglas de Uso</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Redes Sociales y App -->
                    <div class="col-md-3 text-center text-md-right">
                        <h6 class="text-warning font-weight-bold mb-3">Síguenos</h6>
                        <div class="mb-4">
                            <!-- Iconos simulados -->
                            <a href="#" class="btn btn-sm text-dark font-weight-bold rounded-circle mr-1" style="background-color: #ffc107; width: 32px; height: 32px; line-height: 20px;">f</a>
                            <a href="#" class="btn btn-sm text-dark font-weight-bold rounded-circle mr-1" style="background-color: #ffc107; width: 32px; height: 32px; line-height: 20px;">𝕏</a>
                            <a href="#" class="btn btn-sm text-dark font-weight-bold rounded-circle mr-1" style="background-color: #ffc107; width: 32px; height: 32px; line-height: 20px;">ig</a>
                        </div>
                        <!--
                        <button class="btn btn-outline-light btn-sm w-100" style="border-color: #92a4bd; color: #92a4bd;">Descarga nuestra App 🎮</button>
-->
                    </div>
                </div>

                <hr style="border-color: #1a365d; margin-bottom: 20px;">

                <!-- Legales -->
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left text-muted small mb-2 mb-md-0">
                        &copy; {{ date('Y') }} GameList. Todos los derechos reservados.
                    </div>
                    <div class="col-md-6 text-center text-md-right small">
                        <a href="#" class="text-muted text-decoration-none mr-3">Política de Privacidad</a>
                        <a href="#" class="text-muted text-decoration-none">Términos del Servicio</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
