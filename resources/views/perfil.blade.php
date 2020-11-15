@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-2 bg-azul-secundario" >
        
        </div>
        <div class="col-8 bg-azul-primario"  >
        
        <div class="bg-amarillo-verde">
                titulo 1 
        </div>

        </div>
        
        <div class="col-2 bg-azul-secundario ">
        </div>
    </div>
    
    <div class="row">

        <div class="col bg-azul-secundario " > </div>

        <div class="col-9 bg-azul-primario"> 
            <!-- Carusel         -->
            <div class="row">
                <div class="col-2 bg-azul-primario"></div>
                <div class="bg-oscuro container col-8">
                    <div class="row">
                        <div class="col-12">
                            <br>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-4">
                            <img src="{!! asset('images/yopuej.jpg') !!}" alt="..." class="rounded-circle responsive"  width="50" height="50" >
                        </div>

                        <div class="col-7">
                            <div class="row">
                                <div class="col-12">
                                <h3>nickName</h3> 
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-12">
                                <p> Arriba las poderosas aguilas del América</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                        <br>
                        </div>
                    </div>


                </div>
                <div class="col-2 bg-azul-primario"></div>
            </div>
            
            <!-- Titulo -->
        
            <div class="bg-amarillo-verde">
                <h2>GameList de userName</h2> 
            </div>
        
            <div class="bg-azul-primario">
                <div class="card" style="width: 10rem;">
                    <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example</p>
                        <a href="#" class="btn btn-primary">+GameList</a>
                    </div>
                </div>
            </div>

            <!-- Titulos -->

            <div class="row">
                <div class="col bg-amarillo-verde" >
                    <h2>Favoritos</h2> 
                </div>
                <div class="col bg-amarillo-verde ">
                    <h2>Quiero jugar</h2> 
                </div>
            </div>
        
            <div class="row">
                <div class="col bg-azul-primario">

                <div id="app">
                    {{ message }}
                </div>

                <!-- <div id="app">
                    <b-container>
                        <b-row>
                        <b-col cols="12">
                            <carousel :perPage="3">
                            <slide class="p-2">
                                <b-card title="Card Title 1" img-src="https://picsum.photos/600/300/?image=25" img-alt="Image" img-top tag="article">
                                <b-card-text>
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </b-card-text>
                                <b-button href="#" variant="primary">Go somewhere</b-button>
                                </b-card>
                            </slide>
                            <slide class="p-2">
                                <b-card title="Card Title 2" img-src="https://picsum.photos/600/300/?image=25" img-alt="Image" img-top tag="article">
                                <b-card-text>
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </b-card-text>

                                <b-button href="#" variant="primary">Go somewhere</b-button>
                                </b-card>
                            </slide>
                            <slide class="p-2">
                                <b-card title="Card Title 3" img-src="https://picsum.photos/600/300/?image=25" img-alt="Image" img-top tag="article">
                                <b-card-text>
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </b-card-text>

                                <b-button href="#" variant="primary">Go somewhere</b-button>
                                </b-card>
                            </slide>
                            <slide class="p-2">
                                <b-card title="Card Title 4" img-src="https://picsum.photos/600/300/?image=25" img-alt="Image" img-top tag="article">
                                <b-card-text>
                                    Some quick example text to build on the card title and make up the bulk of the card's content.
                                </b-card-text>

                                <b-button href="#" variant="primary">Go somewhere</b-button>
                                </b-card>
                            </slide>
                            </carousel>
                        </b-col>
                        </b-row>
                    </b-container>
                </div> -->


                    <!-- <div class="card" style="width: 10rem;">
                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example</p>
                            <a href="#" class="btn btn-primary">+GameList</a>
                        </div>
                    </div> -->
                </div>
                <div class="col bg-azul-primario">
                    <div class="card" style="width: 10rem;">
                        <img src="{!! asset('images/CVIcover.jpg') !!}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example</p>
                            <a href="#" class="btn btn-primary">+GameList</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </div>

        <div class="col bg-azul-secundario" > </div>

    </div>
</div>

<script>
var app = new Vue({
  el: '#app',
  data: {
    message: 'Hello Vue!'
  }
})
</script>
@endsection