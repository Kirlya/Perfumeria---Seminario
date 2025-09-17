<div>
    <input id="producto" type="text" class="form-control @error('producto') is-invalid @enderror" wire:model="busqueda" wire:keydown="buscarProducto" name="producto" value="{{ old('producto') }}" required autocomplete="producto" autofocus>             
     @if(isset ($productos) && count($productos) > 0 && $this->busqueda <> '')
        <div class="search-results" style="position:absolute;z-index:2;"> 
            @foreach ($productos as $producto)
            <div class="search-item " style="position:relative;display:grid;background-color:white;padding:0.5em;display:inline-block;width:100%;border-block-end: 0.01em solid black;" wire:click="terminarBusq({{$producto}})">
                <a style="color:black;text-decoration:none;"><p style="font-size: 16px; display:inline-block">{{$producto->codigo}}-{{ $producto->nombre }}</p></a>
            </div>
            @endforeach
         @endif
</div>
