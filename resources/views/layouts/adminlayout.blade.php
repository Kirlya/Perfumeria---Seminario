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
<div class="wrapper" style="padding:2%">

<div>
    <div id="menu">
        <!-- Menu opciones -->
        <div id="logo">
            <a href={{route('home')}}>Logo</a>
        </div>
        <div class="col-md-9">
            <h1>Menu Administración</h1>
            <!-- Agregar iconos para volver a la pagina-->
            
        </div>  
        <div>
            <ul class="nav" style="display: flex; justify-content:space-evenly;">
                <li class="nav-item"><a class="btn btn-info" href="{{route('admin-usuarios')}}">Usuarios</a></li>
                <li class="nav-item"><a class="btn btn-info" href="{{route('admin-productos')}}">Productos</a></li>
                <li class="nav-item"><a class="btn btn-info" href="{{route('ventas')}}">Ventas</a></li>
                <li class="nav-item"><a class="btn btn-info" href="{{route('admin-categorias')}}">Categorias</a></li>
                <li class="nav-item"><a class="btn btn-info" href="{{route('admin-subcategorias')}}">SubCategorias</a></li>
                <li class="nav-item"><a class="btn btn-info" href="{{route('admin-marcas')}}">Marcas</a></li>
                <li class="nav-item"><a class="btn btn-info" href="{{route('admin-etiquetas')}}">Etiquetas</a></li>
            </ul>
        </div>
    </div>
    
    
</div>
  
</div>
    @yield('content') 
</body>
</html>