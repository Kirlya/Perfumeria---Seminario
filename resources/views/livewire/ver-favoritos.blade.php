<div style="padding: 2%">
    <h2>Favoritos</h2>
    @if($vacio)
        <h5 style="margin-top:2%">No tienes Productos Favoritos</h5>
    @else
   <table class="table">
        <thead>
            <tr>
                <th scope="row"></th>
                <th scope="col">Nombre</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <th scope="row"> <img src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}" height="100px" width="auto"></th>
                <th><a href="{{route('producto',$producto->codigo)}}" style="color:black;text-decoration:none;">{{ $producto->nombre }}</a></th>
                <th>
                    <a class="btn btn-success" href="{{route('producto',$producto->codigo)}}">Comprar</a>
                    <button class="btn btn-danger" wire:click="eliminarFavorito({{$producto->codigo}})">Eliminar</button>
                </th>
            </tr>
            
            @endforeach

        </tbody>
   </table>
   @endif
</div>