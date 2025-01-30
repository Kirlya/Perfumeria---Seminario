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
    <link rel="stylesheet" href="/css/layout.css">
    <title>Perfumeria</title>
    @livewireStyles
</head>
<body>
@php
  use Illuminate\Support\Facades\DB;
  $categorias = DB::table('categorias')->where('activo','=','1')->get();  
@endphp
    <div id="brand">
        Perfumeria Laravel
    </div>
    <div id="icon-box">  
        @if(Auth::user() == null)
  
            <a class="icons cl-dark" href="{{ route('login') }}">
              <i class="fa-solid fa-user fa-xl"></i>
            </a>          
        @else
            <div class="dropdown" width="20px" height="auto" style="display:inline">
              <a href="" class="icons cl-dark" type="button" id="user-menu" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-user fa-xl"></i>
              </a>
              <ul class="dropdown-menu" aria-labelledby="user-menu">
                <li><a class="dropdown-item" href="{{route('perfil')}}">Perfil</a></li>
                <li><a class="dropdown-item" href="{{route('compras')}}">Compras</a></li>
                <li><a class="dropdown-item" href="{{route('logout')}}">Cerrar Sesion</a></li>
              </ul> 
            </div>
            
        @endif 
        <a href="{{route('favoritos')}}" class="icons cl-dark">
            <i class="fa-solid fa-heart fa-xl"></i>
        </a>
        <a href="{{route('carrito')}}" class="icons cl-dark">
            <i class="fa-solid fa-cart-shopping fa-xl"></i>
        </a>
    </div>
    <div id="busqueda">
        <livewire:busqueda />
    </div>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" id="navbar-ul" style="--bs-scroll-height: 100px;">
              @foreach ($categorias as $categoria)
              <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <p> {{ $categoria->nombre }} </p>
                </a>
                @php
                  $subcategorias = DB::table('sub_categorias')->where('categoria_id','=',$categoria->id)->where('activo','=',1)->get();
                @endphp
              
                <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                  @foreach ($subcategorias as $subcategoria)
                    <li><a class="dropdown-item" href="{{route('porsubcategoria', ['categoria_nombre' => $categoria->nombre , 'subcategoria_nombre' => $subcategoria->nombre])}}"> <p> {{ $subcategoria->nombre }}</p> </a></li>
                  @endforeach
                </ul>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
    </nav>
    
    @yield('content')

    <footer id="footer">
      <ul>
        <li class="li-footer"><h6>Contacto</h6></li>
        <li class="li-footer"><h6>Terminos y Acuerdos</h6></li>
        <li class="li-footer"><h6>Sucursal</h6></li>
        <li class="li-footer"><h6>Preguntas Frecuentes</h6></li>
        <li class="li-footer"><h6>Soporte</h6></li>
      </ul>
    </footer>

    @livewireScripts
</body>
</html>