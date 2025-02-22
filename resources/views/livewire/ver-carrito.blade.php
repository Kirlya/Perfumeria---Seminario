<div style="padding: 2%">
    <h2>Carrito</h2>
    @if($vacio)
        <h5 style="margin-top:2%">No hay Productos en tu Carrito</h5>
    @else
   <table class="table">
        <thead>
            <tr>
                <th scope="row"></th>
                <th scope="col">Nombre</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            @php
                $cantidad = DB::table('productos_carritos')->where('usuario_id',Auth::id())->where('producto_id',$producto->codigo)->value('cantidad');
                $precio = DB::table('productos_carritos')->where('usuario_id',Auth::id())->where('producto_id',$producto->codigo)->value('precio');
                $total = $total + $precio;
            @endphp
            <tr>
                <th scope="row"> <img src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}" height="100px" width="auto"></th>
                <th><a href="{{route('producto',$producto->codigo)}}" style="color:black;text-decoration:none;">{{ $producto->nombre }}</a></th>
                <th>{{$cantidad}}</th>
                <th>{{$precio}}</th>
                <th>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-carritos" wire:click="codP({{$producto->codigo}})">Editar</button>
                    <button class="btn btn-success" wire:click="sacarCarrito({{$producto->codigo}})">Eliminar</button>
                </th>
            </tr>
            @endforeach

        </tbody>
   </table>
   <div style="display:flex; justify-content:space-between;margin-bottom:1%">
        <button class="btn btn-success subtitles" wire:click="completarCompra()">Comprar Todo</button>
        <h5 align="right" style="display:inline;">Total:{{$total}}</h5>
   </div>
   <button class="btn btn-danger subtitles" wire:click="vaciarCarrito()">Vaciar</button>
   <div class="modal fade" id="modal-carritos" wire:ignore.self tabindex="-1" aria-labelledby="modal-label-carrito" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-label-carrito">Cantidad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="number" wire:model="cant" min="1" >
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary subtitles" wire:click="editarCantidad()"  data-bs-dismiss="modal" >Actualizar</button>
            <button type="button" class="btn btn-secondary subtitles" data-bs-dismiss="modal">Cerrar</button>
          
        </div>
      </div>
    </div>
  </div>
   @endif
</div>
