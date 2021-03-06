@extends('layouts.app')

        <!-- Vue -->
        <script src="https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.js"></script>

        <!-- Vue y carusel -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.16/vue.min.js"></script>
        <script src="https://cdn.rawgit.com/SSENSE/vue-carousel/6823411d/dist/vue-carousel.min.js"></script>

@section('content')
<div class="content">
    <!-- <div class="row">
        <div class="col-2 bg-azul-secundario" >
        
        </div>
        <div class="col-8 bg-azul-primario"  >
        
        <div class="bg-azul-negro">
                titulo 1 
        </div>

        </div>
        
        <div class="col-1 bg-azul-secundario ">
        </div>
    </div> -->
    
    <div class="row">

        <div class="col-2 bg-azul-secundario " > </div>

        <div class="col-8 bg-azul-primario">

            <!-- Carusel -->

            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                </ol>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{!! asset('images/smb3.jpg') !!}" class="d-block w-100" alt="sm3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{!! asset('images/hl2.jpg') !!}" class="d-block w-100" alt="hl2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="{!! asset('images/gow.jpg') !!}" class="d-block w-100" alt="gow">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                        </div>
                    </div>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
            
            <!-- Titulo -->
        
            <div class="bg-amarillo-verde">
                <h2>Titulo 1</h2> 
            </div>

            
            <div id="app">
                <b-container>
                <b-row>
                    <b-col cols="12">
                    <carousel :perPageCustom="[[400, 2], [700, 4]]">

                        <slide class="p-2">
                            <div class="card" style="width: 10rem;">
                                <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card 1</h5>
                                <p class="card-text">Some quick example text.</p>
                                <a href="#" class="btn btn-primary">+GameList</a>
                                </div>
                            </div>
                        </slide>

                        <slide class="p-2">
                            <div class="card" style="width: 10rem;">
                                <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card 2</h5>
                                <p class="card-text">Some quick example text.</p>
                                <a href="#" class="btn btn-primary">+GameList</a>
                                </div>
                            </div>
                        </slide>

                        <slide class="p-2">
                            <div class="card" style="width: 10rem;">
                                <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card 3</h5>
                                <p class="card-text">Some quick example text.</p>
                                <a href="#" class="btn btn-primary">+GameList</a>
                                </div>
                            </div>
                        </slide>

                        <slide class="p-2">
                            <div class="card" style="width: 10rem;">
                                <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card 4</h5>
                                <p class="card-text">Some quick example text.</p>
                                <a href="#" class="btn btn-primary">+GameList</a>
                                </div>
                            </div>
                        </slide>

                        <slide class="p-2">
                            <div class="card" style="width: 10rem;">
                                <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card 3</h5>
                                <p class="card-text">Some quick example text.</p>
                                <a href="#" class="btn btn-primary">+GameList</a>
                                </div>
                            </div>
                        </slide>

                        <slide class="p-2">
                            <div class="card" style="width: 10rem;">
                                <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                <div class="card-body">
                                <h5 class="card-title">Card 4</h5>
                                <p class="card-text">Some quick example text.</p>
                                <a href="#" class="btn btn-primary">+GameList</a>
                                </div>
                            </div>
                        </slide>
                        
                    </carousel>
                    </b-col>
                </b-row>
                </b-container>
            </div>

            <!-- Titulos -->

            <div class="row">
                <div class="col bg-amarillo-verde" >
                    <h2>Titulo 2</h2> 
                </div>
                <div class="col bg-amarillo-verde ">
                    <h2>Titulo 3</h2> 
                </div>
            </div>
        
            <div class="row">
                <div class="col-6 bg-azul-primario">
                <div id="app">
                        <b-container>
                        <b-row>
                            <b-col cols="12">
                            <carousel :perPage="3">

                                <slide class="p-2">
                                    <div class="card" style="width: 10rem;">
                                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">Card 1</h5>
                                        <p class="card-text">Some quick example text.</p>
                                        <a href="#" class="btn btn-primary">+GameList</a>
                                        </div>
                                    </div>
                                </slide>

                                <slide class="p-2">
                                    <div class="card" style="width: 10rem;">
                                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">Card 2</h5>
                                        <p class="card-text">Some quick example text.</p>
                                        <a href="#" class="btn btn-primary">+GameList</a>
                                        </div>
                                    </div>
                                </slide>

                                <slide class="p-2">
                                    <div class="card" style="width: 10rem;">
                                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">Card 3</h5>
                                        <p class="card-text">Some quick example text.</p>
                                        <a href="#" class="btn btn-primary">+GameList</a>
                                        </div>
                                    </div>
                                </slide>

                                <slide class="p-2">
                                    <div class="card" style="width: 10rem;">
                                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">Card 4</h5>
                                        <p class="card-text">Some quick example text.</p>
                                        <a href="#" class="btn btn-primary">+GameList</a>
                                        </div>
                                    </div>
                                </slide>
                                
                            </carousel>
                            </b-col>
                        </b-row>
                        </b-container>
                    </div>
                </div>

                <!-- <div class="col-1 ">

                </div> -->

                <div class="col-6 bg-azul-primario">
                <div id="app">
                        <b-container>
                        <b-row>
                            <b-col cols="12">
                            <carousel :perPage="3">

                                <slide class="p-2">
                                    <div class="card" style="width: 10rem;">
                                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">Card 1</h5>
                                        <p class="card-text">Some quick example text.</p>
                                        <a href="#" class="btn btn-primary">+GameList</a>
                                        </div>
                                    </div>
                                </slide>

                                <slide class="p-2">
                                    <div class="card" style="width: 10rem;">
                                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">Card 2</h5>
                                        <p class="card-text">Some quick example text.</p>
                                        <a href="#" class="btn btn-primary">+GameList</a>
                                        </div>
                                    </div>
                                </slide>

                                <slide class="p-2">
                                    <div class="card" style="width: 10rem;">
                                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">Card 3</h5>
                                        <p class="card-text">Some quick example text.</p>
                                        <a href="#" class="btn btn-primary">+GameList</a>
                                        </div>
                                    </div>
                                </slide>

                                <slide class="p-2">
                                    <div class="card" style="width: 10rem;">
                                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                        <h5 class="card-title">Card 4</h5>
                                        <p class="card-text">Some quick example text.</p>
                                        <a href="#" class="btn btn-primary">+GameList</a>
                                        </div>
                                    </div>
                                </slide>
                                
                            </carousel>
                            </b-col>
                        </b-row>
                        </b-container>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="col-1 bg-azul-secundario" > </div>

    </div>
</div>


        <!-- carousel -->
        <script src="{{ asset('js/carousel.js') }}"></script>
    
@endsection