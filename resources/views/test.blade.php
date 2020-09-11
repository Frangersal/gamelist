@extends('layouts.app')
@section('content')
<div class="content">
    <div class="row">
        <div class="col bg-azul-secundario" >
        
        </div>
        <div class="col-9 bg-azul-primario"  >

        <!-- serch shit start-->

        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Buscar...">
            <div class="input-group-append">
                <button class="btn btn-amarillo-verde" type="submit">Buscar</button>
            </div>
        </div>
        
        <!-- serch shit end -->
        

        </div>
        
        <div class="col bg-azul-secundario ">
        </div>
    </div>
    
    <div class="row">

        <div class="col bg-azul-secundario " > </div>

        <div class="col-9 bg-azul-primario">

            <!-- Carusel -->

            
            <!-- Titulo -->
        
            <div class="bg-azul-negro">
                <h2>Titulo 1</h2> 
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
                    <h2>Titulo 2</h2> 
                </div>
                <div class="col bg-amarillo-verde ">
                    <h2>Titulo 3</h2> 
                </div>
            </div>
        
            <div class="row">
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
@endsection