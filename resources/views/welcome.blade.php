@extends('layouts.app')

@section('content')
<!-- Contenedor general -->
<div class="pb-5" style="background-color: #0b1a2e; color: white;"> <!-- Fondo azul oscuro profundo -->
    
    <!-- CONTENEDOR PRINCIPAL RESPONSIVE -->
    <div class="container mt-4">
        
        <!-- SECCIÓN HERO (Destacados) -->
        <div class="row mb-5">
            <div class="col-lg-8">
                <!-- Carrusel principal (ej. juego de moda) -->
                <div id="heroCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#heroCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#heroCarousel" data-slide-to="1"></li>
                        <li data-target="#heroCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{!! asset('images/smb3.jpg') !!}" class="d-block w-100 rounded" alt="Super Mario Bros 3" style="height: 400px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block rounded px-3 py-2" style="background-color: rgba(11, 26, 46, 0.75);">
                                <h5>Super Mario Bros 3</h5>
                                <p class="mb-0">El clásico indispensable. Revive la aventura.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{!! asset('images/hl2.jpg') !!}" class="d-block w-100 rounded" alt="Half-Life 2" style="height: 400px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block rounded px-3 py-2" style="background-color: rgba(11, 26, 46, 0.75);">
                                <h5>Half-Life 2</h5>
                                <p class="mb-0">La obra maestra de Valve que revolucionó los FPS.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="{!! asset('images/gow.jpg') !!}" class="d-block w-100 rounded" alt="God of War" style="height: 400px; object-fit: cover;">
                            <div class="carousel-caption d-none d-md-block rounded px-3 py-2" style="background-color: rgba(11, 26, 46, 0.75);">
                                <h5>God of War</h5>
                                <p class="mb-0">La épica travesía de Kratos y Atreus.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            
            <div class="col-lg-4 d-none d-lg-block rounded p-3" style="background-color: #142a45;">
                <!-- Lista vertical de "Próximos en la lista" -->
                <h5 class="text-warning font-weight-bold">Siguientes Destacados</h5>
                
                <div class="d-flex mb-3 align-items-center">
                    <img src="{!! asset('images/hl2.jpg') !!}" width="80" class="rounded mr-3" alt="hl2">
                    <div>
                        <h6 class="mb-1">Half-Life 2</h6>
                        <small class="text-light">Trailer oficial - Act 1</small>
                    </div>
                </div>

                <div class="d-flex mb-3 align-items-center">
                    <img src="{!! asset('images/gow.jpg') !!}" width="80" class="rounded mr-3" alt="gow">
                    <div>
                        <h6 class="mb-1">God of War</h6>
                        <small class="text-light">Gameplay Reveal PS5</small>
                    </div>
                </div>

                <div class="d-flex align-items-center">
                    <img src="{!! asset('images/smb3.jpg') !!}" width="80" class="rounded mr-3" alt="smb3">
                    <div>
                        <h6 class="mb-1">Super Mario Bros 3</h6>
                        <small class="text-light">Speedrun Highlights</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECCIÓN 1: Populares -->
        <div class="d-flex align-items-center mb-3">
            <div style="width: 5px; height: 30px; background-color: #ffc107; margin-right: 10px;"></div>
            <h3 class="mb-0 text-white">Populares Hoy</h3>
        </div>
        <div class="row mb-5">
            @for ($i = 1; $i <= 6; $i++)
            <div class="col-6 col-sm-4 col-lg-2 mb-4">
                <div class="card h-100 border-0" style="background-color: #1a365d; color: white;">
                    <!-- Botón flotante al estilo IMDb Watchlist -->
                    <div class="position-absolute p-1" style="z-index: 10;">
                        <button class="btn btn-sm text-white rounded-circle" style="background-color: #0b1a2e; opacity: 0.9;" title="Add to GameList">➕</button>
                    </div>
                    
                    <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="Cover" style="height: 250px; object-fit: cover;">
                    
                    <div class="card-body p-2 d-flex flex-column">
                        <p class="mb-1 text-muted small d-flex align-items-center">
                            <span class="text-warning mr-1">⭐</span> <span style="color: #92a4bd;">8.{{ $i }}</span>
                            <span class="ml-auto text-primary" style="cursor: pointer;" title="Rate">☆</span>
                        </p>
                        <h6 class="card-title text-truncate">Juego de Ejemplo {{ $i }}</h6>
                        <button class="btn btn-sm w-100 mt-auto text-light border-0" style="background-color: #2b4c7e;">+ GameList</button>
                    </div>
                </div>
            </div>
            @endfor
        </div>

        <!-- SECCIÓN 2 y 3 divididas -->
        <div class="row mt-5">
            <div class="col-md-6 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <div style="width: 5px; height: 30px; background-color: #ffc107; margin-right: 10px;"></div>
                    <h4 class="mb-0 text-white">Próximos Lanzamientos</h4>
                </div>
                <!-- Grilla de próximos juegos aquí -->
                <div class="row">
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="col-6 col-sm-4 mb-3">
                        <div class="card border-0 h-100" style="background-color: #1a365d;">
                            <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="Cover" style="height: 180px; object-fit: cover;">
                            <div class="card-body p-2 d-flex flex-column">
                                <h6 class="card-title text-white text-truncate mb-1">Próximo {{ $i }}</h6>
                                <button class="btn btn-sm w-100 mt-auto text-light border-0" style="background-color: #2b4c7e;">+ GameList</button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="d-flex align-items-center mb-3">
                    <div style="width: 5px; height: 30px; background-color: #ffc107; margin-right: 10px;"></div>
                    <h4 class="mb-0 text-white">Juegos de Rol (RPG)</h4>
                </div>
                <!-- Grilla de RPGs aquí -->
                <div class="row">
                    @for ($i = 1; $i <= 3; $i++)
                    <div class="col-6 col-sm-4 mb-3">
                        <div class="card border-0 h-100" style="background-color: #1a365d;">
                            <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="Cover" style="height: 180px; object-fit: cover;">
                            <div class="card-body p-2 d-flex flex-column">
                                <p class="mb-1 small text-warning">⭐ <span style="color: #92a4bd;">9.{{ $i }}</span></p>
                                <h6 class="card-title text-white text-truncate mb-1">RPG Épico {{ $i }}</h6>
                                <button class="btn btn-sm w-100 mt-auto text-light border-0" style="background-color: #2b4c7e;">+ GameList</button>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>

    </div>
</div>

@endsection