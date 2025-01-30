    @php
    use App\Models\Producto;
        //$productos = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->where('productos.subcategoria_id','=',$subcategoria)->where('sub_categorias.categoria_id','=',$categoria)->where('productos.activo','=',1)->select('productos.*')->get();
        //pluck para devolver mas valores,value solo uno. Seleccionado el campo
        $cod_marcas = DB::table('productos')->join('marcas','productos.cod_marca','=','marcas.codigo')->where('productos.subcategoria_id',$subcategoria)->where('productos.activo','=',1)->select('marcas.codigo','marcas.nombre')->get();
    @endphp
    <div class="lista-productos container-fluid d-inline-flex p-2 bd-highlight" style="margin-top:2%;margin-left:1%" id="producto-subc">
        
        @if(empty($productos->toArray()) && empty($cod_marcas->toArray()))
            Sin Productos
        @else
            <div id="div-filtro" style=" padding:1%;width:15%">
                <!--<form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" wire:keydown="buscar" wire:model="busqueda">      
                </form> -->
                <br>
                @if(isset($cod_marcas) && count($cod_marcas)>0)
                    <h6>Marcas</h6> 
                    @foreach($cod_marcas as $cod_marca)
                        <label for="{{$cod_marca->nombre}}"><p class="subtitles">{{$cod_marca->nombre}} </p></label> 
            <!--cuando se hace clic al checkbox necesito guardar el nombre de la variable  -->
                        <input type="checkbox" wire:click="agregarMarca({{json_encode($cod_marca->codigo)}})" name="{{$cod_marca->nombre}}" id=""> <br>
                    @endforeach 
                @endif
                <br>
            <h6>Precio</h6>
            <label for=""><p class="subtitles">Minimo:</p></label> 
            
            <p class="subtitles">{{$mina}}</p> 
            <input type="range" id="minP" max="{{$maxv}}" step="1000" min="0" value="{{ $mina }}" wire:model="mina" wire:change="actualizarPrecioMin()"/> <br>
            <label for=""><p class="subtitles">Maximo:</p></label> 
            <p class="subtitles">{{$maxa}}</p> 
            <input type="range" id="maxP" max="{{$maxv}}" step="1000" min="0" value="{{ $maxa }}" wire:model="maxa" wire:change="actualizarPrecioMax()" />
            <br>
            <br>
            <h6>Orden</h6>
            <select name="" id="o-tipo" wire:model="orden_name">
                <option value="" selected hidden ></option>
                <option value="nombre"><p class="subtitles">Nombre</p></option>
                <option value="precio"><p class="subtitles">Precio</p></option>
            </select>

            <select name="" id="o-asc-des" wire:model="orden_crit">
                <option value="" selected hidden ></option>
                <option value="1"><p class="subtitles">Asc</p></option>
                <option value="2"><p class="subtitles">Des</p></option>
            </select>
            <br>
            <br>
            <a class="btn btn-dark" wire:click="orden()"><p class="subtitles">Aplicar</p></a>

            <script>
                let minInput = document.getElementById('minP');
                let maxInput = document.getElementById('maxP');
            
                minInput.addEventListener('input', function () {
                    if (parseInt(minInput.value) > parseInt(maxInput.value)) {
                        minInput.value = maxInput.value;
                    }
                });
            
                maxInput.addEventListener('input', function () {
                    if (parseInt(maxInput.value) < parseInt(minInput.value)) {
                        maxInput.value = minInput.value;
                    }
                });
            </script>
        
            <br><br>
        <!--<h6>Etiquetas</h6> -->
            
            </div>
            @if(empty($productos->toArray()))
                 <div style="content:3%;margin:3%;"><p>No se encuentran Productos</p></div>
            @endif
        @endif

        
            @foreach ($productos as $product)
            
            <!-- Visible o no para solo los tipo Usuario probablemente Redireccion a login -->
            <div class="card text-center pointer"  style="width: 15rem; margin: 2%; position:relative;">
                <div style="position:absolute; right:2%; top:2%; z-index:3; width:20%;padding-top:5px" wire:click="agregarFavorito({{json_encode($product->codigo)}})" >
                    
                    @hasanyrole('Administrador|Operador|Usuario')
                        @if(in_array($product->codigo,$favoritos))
                            <i class="fa-solid heart fa-heart fa-2xl" style="color: #e10e0e;"> </i>
                        @else
                            <i class="fa-regular heart fa-heart fa-2xl" style="color: #e10e0e;"></i>
                        @endif
                    @else
                        <a href="{{route('login')}}"> <i class="fa-regular heart fa-heart fa-2xl" style="color: #e10e0e;"></i> </a>
                    @endhasanyrole
                </div>
                
                
                <img src="{{asset($product->imagen)}}" alt="" style="">
                <div class="card-body" >
                    <h6 class="card-title">
                        {{$product->nombre}}
                    </h6>
                    <p class="card-text subtitles">${{$product->precio}}</p>
                    @php
                    $producto = Producto::find($product->codigo);
                    @endphp
                    <br>
                 <a href="{{route('producto', $producto )}}" style="text-decoration:none;color:white; margin-top:1em;" class="btn btn-dark subtitles">Ver Producto</a>
                </div>
            </div>
           
        @endforeach
    
    
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