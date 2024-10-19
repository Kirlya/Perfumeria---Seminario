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
@php
  use Illuminate\Support\Facades\DB;
  $categorias = DB::table('categorias')->get();  
@endphp

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Perfumeria</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
              @foreach ($categorias as $categoria)
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  {{ $categoria->nombre }}
                </a>
                @php
                  $subcategorias = DB::table('sub_categorias')->where('categoria_id','=',$categoria->id)->get();
                @endphp
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  @foreach ($subcategorias as $subcategoria)
                  <li><a class="dropdown-item" href="#">{{ $subcategoria->nombre }}</a></li>
                  @endforeach
                </ul>
              </li>
              @endforeach
            </ul>

            @can('editar-producto')
                <button class="btn btn-dark"><a href="#" target="" class="text-decoration:none">Administrar</a> </button>  
            @else
                <button>Problema</button>
            @endcan
            @if (auth()->user())
                <button><a class="btn btn-dark" href="{{route('logout')}}" style="text-decoration:none">Logout</a></button>
            @endif
          

            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-dark" type="submit"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i></button>
            </form>
            <a class="icons" href="{{ route('login') }}">
                <i class="fa-solid fa-user fa-lg" style="color: #ffffff;"></i>
            </a> 
            <a href="" class="icons">
              <i class="fa-solid fa-heart fa-lg" style="color: #ffffff;"></i>
            </a>
            <a href="" class="icons">
              <i class="fa-solid fa-cart-shopping fa-lg" style="color: #ffffff;"></i>
            </a>
          </div>
        </div>
      </nav>
        @yield('content')
        
    <footer>

    </footer>
</body>
</html>