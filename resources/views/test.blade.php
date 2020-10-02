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
                <button class="btn btn-amarillo-verde"  type="submit">Buscar</button>
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
        
            <button type="button" class="btn btn-primary" onclick="traer()">Obtener</button>
            <div class="mt-5" id="contenido">
            
            </div>
            <br>
           
        </div>

        <div class="col bg-azul-secundario" > </div>

    </div>
</div>

<script>
    var contenido = document.querySelector('#contenido')
    function traer(){
        fetch('text.txt')
        .then(data=>data.text())
        .then(data=>{
            console.log(data)
            contenido.innerHTML='${data}'
        })
    }
</script>

@endsection