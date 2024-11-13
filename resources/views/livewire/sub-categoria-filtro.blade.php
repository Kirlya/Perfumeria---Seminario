    @php
    use App\Models\Producto;
        $productos = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->where('productos.subcategoria_id','=',$subcategoria)->where('sub_categorias.categoria_id','=',$categoria)->where('productos.activo','=',1)->select('productos.*')->get();
        //pluck para devolver mas valores,value solo uno. Seleccionado el campo
        $cod_marcas = DB::table('productos')->join('marcas','productos.cod_marca','=','marcas.codigo')->where('productos.subcategoria_id',$subcategoria)->where('productos.categoria_id',$categoria)->where('productos.activo','=',1)->select('marcas.codigo','marcas.nombre')->get();
    @endphp

    <div class="lista-productos container-fluid d-inline-flex p-2 bd-highlight" style="margin-top:2%;margin-left:1%">
        <div>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" wire:keydown="buscar" wire:model="busqueda">      
            </form>
        @if(isset($cod_marcas) && count($cod_marcas)>0)
        <h6>Marcas</h6> <br>
        @foreach($cod_marcas as $cod_marca)
            <label for="{{$cod_marca->nombre}}">{{$cod_marca->nombre}} </label> 
            <!--cuando se hace clic al checkbox necesito guardar el nombre de la variable  -->
            <input type="checkbox" name="{{$cod_marca->nombre}}" id=""> <br>
        @endforeach 
        @endif
            
        </div>
        @foreach ($productos as $product)
            
            <!-- Visible o no para solo los tipo Usuario probablemente Redireccion a login -->
            <div class="card text-center" style="width: 15rem; margin: 2%;">
                <img src="{{asset($product->imagen)}}" alt="" style="">
                <div class="card-body" >
                    <h6 class="card-title">
                        {{$product->nombre}}
                    </h6>
                    <p class="card-text">${{$product->precio}}</p>
                    @php
                    $producto = Producto::find($product->codigo);
                 @endphp
                 <a href="{{route('producto', $producto )}}" style="text-decoration:none;color:white;" class="btn btn-primary violeta">Ver Producto</a>
                </div>
            </div>
           
        @endforeach
    </div>