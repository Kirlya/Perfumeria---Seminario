<div class="container-prod container-fluid" id="show">
    <div id="show-div">
        <div id="show-img">
            <img src="{{asset($producto->imagen)}}" alt="{{$producto->nombre}}">
        </div>
        <div id="show-cont">
            
                <!-- aqui van un div con cada img -->
            
        </div>
    </div>
    <div id="desc-producto" style="position: relative;">
        <!-- falta usuario registrado en el heart si no esta va redireccionado al login --SOLUCIONADO implementar en subcategoria-- -->
        @hasanyrole('Administrador|Operador|Usuario')
            @if($producto->activo)
                <div style="position:absolute; z-index:3; width:30px; right:5%;" wire:click="agregarFavorito()" >
                    @if($favorito == $producto->codigo)
                        <i class="fa-solid heart fa-heart fa-2xl" style="color: #e10e0e;"> </i>
                    @else
                        <i class="fa-regular heart fa-heart fa-2xl" style="color: #e10e0e;"></i>
                    @endif               
                </div>
            @endif
        @else
            <div style="position:absolute; z-index:3; width:30px; right:5%;"><a href="{{route('login')}}">
                <i class="fa-regular heart fa-heart fa-2xl" style="color: #e10e0e;"></i>
            </a>
                
            </div>  
        @endhasanyrole
        <h3 style="padding-right: 5%">{{$producto->nombre}}</h3>
        
        @php
            $marca = DB::table('marcas')->where('marcas.codigo',$producto->cod_marca)->value('nombre');
        @endphp
        <!-- Opcion de poder seleccionar la marca para que se rediriga a la pagina con todos los productos de esta -->
        <h5>{{$marca}}</h5>
        <p>{{$producto->precio}}</p>
        <p style="align-self: center">{{$producto->descripcion}}</p>
        <!-- Lo que faltaria aqui opcion si hay otros tipos mas informacion o alguna forma de rellenar el vacio -->
        <br>
        
            <div style="display:flex; flex-direction:row; justify-content:space-between">
                @hasanyrole('Administrador|Operador|Usuario')
                    @if($producto->activo)
                        <a wire:click="comprar()" class="btn btn-dark perf-btn"><p>Comprar</p></a>
                        <br>
                        <button type="button" class="btn btn-dark perf-btn" data-bs-toggle="modal" data-bs-target="#modal-carrito">
                        <p>Añadir al carrito</p>
                        </button>
                    @else
                        @if($producto->cantidad > 0)
                            <a class="btn btn-primary">Producto sin Stock</a>
                        @else
                            Producto no disponible para compra
                        @endif
                    @endif
                @else
                    <a href="{{route('login')}}" class="btn btn-dark perf-btn"><p>Comprar</p></a>
                    <br>
                    <a type="button" class="btn btn-dark perf-btn" href="{{route('login')}}">
                    <p>Añadir al carrito</p>
                    </a>
                @endhasanyrole
            </div>
            
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
