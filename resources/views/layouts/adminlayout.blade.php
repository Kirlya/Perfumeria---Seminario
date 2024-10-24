<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <title>Perfumeria</title>
</head>
<body>
<div class="row">
    <div id="menu" class="col-md-4">
        <!-- Menu opciones -->
        <div id="logo">
            <span>Logo</span>
        </div>
        <div>
            <ul class="list-group">
                <li class="list-group-item"><a href="{{route('admin-usuarios')}}">Usuarios</a></li>
                <li class="list-group-item"><a href="{{route('admin-productos')}}">Productos</a></li>
                <li class="list-group-item"><a href="">Ventas</a></li>
                <li class="list-group-item"><a href="{{route('admin-categorias')}}">Categorias</a></li>
                <li class="list-group-item"><a href="{{route('admin-subcategorias')}}">SubCategorias</a></li>
                <li class="list-group-item"><a href="{{route('admin-marcas')}}">Marcas</a></li>
                <li class="list-group-item"><a href="{{route('admin-etiquetas')}}">Etiquetas</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-8">
        <h1>Menu Administración</h1>
        <!-- Agregar iconos para volver a la pagina-->
        @yield('content')
    </div>  
</div>
  

    
</body>
</html>