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
            <div id="listauser"> 
            
            </div>

        </div>

        <div class="col-1 bg-azul-secundario" > </div>

    </div>
</div>
<script> 
    // Metodos con los que iniciar el documento
    $(document).ready(function(){
        listUser();
    });

    $("#nuevo").click(function(event)
    {
        document.location.href = "{{ route('admin.users.create') }}";
    });
    // Metodo ajax con JQuery
    // $.ajax({
    //     method: "GET",
    //     url: "{{ route('student.answers.store') }}",
    //     dataType: "JSON",
    //     data : hola 
    // });

    // Ajax lista de usuarios
    function listUser() {
        // crearlo
        var xhr = new XMLHttpRequest();

        // abrirlo
        xhr.open("GET", "listall", true);
        
        // revisar que cambie
        xhr.onreadystatechange = function() {
            console.log(xhr.readyState);
            
            if(xhr.readyState == 4 && xhr.status == 200) {
                console.log("Se cargo correctamente");
                
                var listauser = document.getElementById('listauser');
                listauser.innerHTML = xhr.responseText;
            } 
        }

        xhr.send(); 
    }
    // 

    
</script>
@endsection