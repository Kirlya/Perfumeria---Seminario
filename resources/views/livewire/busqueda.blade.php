
<div class="position:relative;">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" wire:keydown="buscar" wire:model="busqueda">      
        <button class="btn btn-dark" type="submit"><i class="fa-solid fa-magnifying-glass fa-lg" style="color: #ffffff;"></i></button>
        @if(isset ($productos) && count($productos) > 0 && $this->busqueda <> '')
        <div class="search-results" style="position:absolute;top:40%;z-index:2;width:80%;s"> 
            @foreach ($productos as $producto)
            <div class="search-item " style="position:relative;display:grid;background-color:white;padding:0.5em;display:inline-block;width:100%;border-block-end: 0.01em solid black;" >
                <img src="{{asset($producto->imagen)}}" alt="" width="5%" height="5%">
                <a href="{{route('producto',$producto)}}" style="color:black;text-decoration:none;"><p style="font-size: 16px; display:inline-block">{{ $producto->nombre }}</p></a>
            </div>
            @endforeach
         @endif
        </div>   
    </form>
</div>
