<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/layout.css">
    <title>Perfumeria</title>
</head>
<style>
    body{
        overflow-y: scroll;
    }
    li{
        display:inline;
    }
</style>
<body>
<div id="admin-title">
    Perfumeria Laravel
</div>
<div id="admin-menu-icon">
    <i class="fa-solid fa-bars fa-2xl"></i>
</div>
<!-- se necesita arreglar para que el menu solo ocupe la pantalla completa -->
<div id="admin-menu-options" class="hidden" hidden>
    <ul id="admin-ul">
        <li class="admin-options-li"><a href="{{route('admin-usuarios')}}">Usuarios</a></li>
        <li class="admin-options-li"><a href="">Grupos</a></li>
        <li class="admin-options-li"><a href="{{route('admin-productos')}}">Productos</a></li>
        <li class="admin-options-li"><a href="{{route('admin-categorias')}}">Categorias</a></li>
        <li class="admin-options-li"><a href="{{route('admin-subcategorias')}}">Subcategorias</a></li>
        <li class="admin-options-li"><a href="{{route('ventas')}}">Ventas</a></li>
        <li class="admin-options-li"><a href="">Envios</a></li>
        <li class="admin-options-li"><a href="{{route('admin-etiquetas')}}">Etiquetas</a></li>
        <li class="admin-options-li"><a href="">Ofertas</a></li>
        <li class="admin-options-li"><a href="{{route('admin-marcas')}}">Marcas</a></li>
    </ul>
</div>
 @yield('content')
@livewireScripts
</body>
<script>
    var menu = document.getElementById("admin-menu-options");
    var icon = document.getElementById("admin-menu-icon");
    icon.addEventListener('click',mostrarMenu);
    function mostrarMenu(){
        /* for some reason the class hidden it's not working
        if(menu.classList.contains("hidden")){
            menu.classList.remove("hidden");
            menu.classList.add("visible"); 
        }
        else {
            menu.classList.remove("visible");
            menu.classList.add("hidden");
        }
        */
       if(menu.hidden){
            menu.hidden=false;
       }
       else{
            menu.hidden=true;
       }
    }
</script>
</html>