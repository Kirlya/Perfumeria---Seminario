<div class="container-prod container-fluid">
    
    <img src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}" id="producto-foto">
    <div id="desc-producto" style="position: relative;">
        @if($producto->activo)
        <div style="position:absolute; z-index:3; width:30px; right:0%; top:0%;" wire:click="agregarFavorito()" >
            @if($favorito == $producto->codigo)
                <i class="fa-solid heart fa-heart fa-2xl" style="color: #e10e0e;"> </i>
            @else
                <i class="fa-regular heart fa-heart fa-2xl" style="color: #e10e0e;"></i>
            @endif               
        </div>
        @endif
        <h3>{{$producto->nombre}}</h3>
        
        @php
            $marca = DB::table('marcas')->where('marcas.codigo',$producto->cod_marca)->value('nombre');
        @endphp
        <h5>{{$marca}}</h5>
        <p>{{$producto->precio}}</p>
        <p style="align-self: center">{{$producto->descripcion}}</p>
        <br>
        @if($producto->activo)
        <a href="{{route('comprar')}}" class="btn btn-primary violeta perf-btn">Comprar</a>
        <br>
        <button type="button" class="btn btn-primary perf-btn violeta" data-bs-toggle="modal" data-bs-target="#modal-carrito">
            Añadir al carrito
          </button>
        @else
          Producto no disponible para compra
        @endif
    </div>

    
      
      <!-- Modal -->
      <div class="modal fade" id="modal-carrito" tabindex="-1" aria-labelledby="modal-label-carrito" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-label-carrito">Cantidad</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="number" wire:model="cantidad" min="1" value={{$cantidad}} >
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" wire:click="agregarCarrito()"  data-bs-dismiss="modal" >Añadir</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              
            </div>
          </div>
        </div>
      </div>
    <script>
        let hearts = document.getElementsByClassName('heart');
        for(let i=0; i<hearts.length;i++){
            hearts[i].addEventListener('mouseover',function(){
                hearts[i].classList.add('fa-beat');
            });
            hearts[i].addEventListener('mouseout',function(){
                hearts[i].classList.remove('fa-beat');
            })
        }
        
    </script>
</div>
