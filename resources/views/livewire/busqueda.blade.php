
<div class="position:relative;">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" wire:keydown="buscar" wire:model="busqueda">      
        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i></button>
        @if(isset ($productos) && count($productos) > 0 && $this->busqueda <> '')
        <div class="search-results" style="position:absolute;top:100%;z-index:2;width:auto;"> 
            @foreach ($productos as $producto)
            <div class="search-item " style="position:relative;display:grid;background-color:white;padding:0.5em;display:inline-block;width:100%;" >
                <img src="{{asset($producto->imagen)}}" alt="" width="40px" height="40px">
                <a href="{{route('producto',$producto)}}" style="color:black;text-decoration:none;">{{ $producto->nombre }}</a>
            </div>
            @endforeach
         @endif
        </div>   
    </form>
</div>
