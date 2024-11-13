<div id="tabla-admin">
    @php
        //$productos = DB::table('productos')->get();
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th scope="col"> <a wire:click="ordenarPorCodigo()">Codigo</a></th>
                <th scope="col">Imagen</th>
                <th scope="col"> <a wire:click="ordenarPorNombre()">Nombre</a> </th>
                <th scope="col">Descripcion</th>
                <th scope="col"> <a wire:click="ordenarPorPrecio()">Precio</a></th>
                <th scope="col"> <a wire:click="ordenarPorCantidad()">Cantidad</a></th>
                <th scope="col"><a wire:click="ordenarPorActivo()">Activo</a></th>
                <th scope="col"><a wire:click="ordenarPorMarca()">Marca</a></th>
                <th scope="col"><a wire:click="ordenarPorSubCategoria()">SubCategoria</a></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                @php
                $marca = DB::table('productos')->join('marcas','productos.cod_marca','=','marcas.codigo')->where('productos.codigo','=',$producto->codigo)->value('marcas.nombre');
                $subcategoria = DB::table('productos')->join('sub_categorias','productos.subcategoria_id','=','sub_categorias.id')->where('productos.codigo','=',$producto->codigo)->value('sub_categorias.nombre');
                @endphp
                <tr>
                    <th scope="row">{{$producto->codigo}}</th>
                    <td>
                        <img src="{{ asset($producto->imagen) }}" alt="{{ $producto->nombre }}" class="img-fluid" style="width: 150px;">
                    </td>
                    <td>{{ $producto->nombre }}</td>
                    
                    <td>{{ $producto->descripcion }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    
                    <td>{{ $producto->activo }}</td>
                    
                    <td>{{ $marca }}</td>
                    <td>{{ $subcategoria }}</td>
                    <td>
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-editarp" wire:click="editsubc({{$producto->codigo}})">Editar</button>
                        <button class="btn btn-dark" wire:click="desHab({{$producto->codigo}})">@if($producto->activo) Deshabilitar @else Habilitar @endif</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <div class="modal fade" id="modal-editarp" wire:ignore.self tab-index="-1" aria-labelledby="modal-title-p" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-p">Producto</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" wire:submit.prevent="update">
                            @csrf

                            <div class="row mb-3">
                                <label for="codigo" class="col-md-4 col-form-label text-md-end">Codigo:</label>
                    
                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo"  wire:model="codigo" required disabled autocomplete="codigo" autofocus>
                    
                                    @error('codigo')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Codigo invalido</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre:</label>
                    
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" wire:model="nombre" required autocomplete="nombre" autofocus>
                    
                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Nombre invalido</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="descripcion" class="col-md-4 col-form-label text-md-end">Descripcion:</label>
                    
                                <div class="col-md-6">
                                    <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" wire:model="descripcion" autocomplete="descripcion" autofocus>
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <label for="precio" class="col-md-4 col-form-label text-md-end">Precio:</label>
                    
                                <div class="col-md-6">
                                    <input id="precio" type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" wire:model="precio" required autocomplete="precio" autofocus>
                    
                                    @error('precio')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Precio invalido</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <label for="cantidad" class="col-md-4 col-form-label text-md-end">Cantidad:</label>
                    
                                <div class="col-md-6">
                                    <input id="cantidad" type="number" class="form-control @error('nombre') is-invalid @enderror" name="cantidad" wire:model="cantidad" required autocomplete="cantidad" autofocus>
                    
                                    @error('cantidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Cantidad invalida</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="row mb-3">
                                <label for="nombre" class="col-md-4 col-form-label text-md-end">Imagen:</label>
                    
                                <div class="col-md-6">
                                    <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" wire:model="imagen" accept="image/*" required autocomplete="imagen" autofocus>
                    
                                    @error('imagen')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Error en la imagen</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @php
                                $marcas = DB::table('marcas')->select('nombre')->get();   
                            @endphp
                            <div class="row mb-3">
                                <label for="marca" class="col-md-4 col-form-label text-md-end">Marca:</label>

                                <div class="col-md-6">
                                    <select name="marca" id="marca" value="{{old('marca')}}" wire:model="marcap" required>
                                    @foreach ($marcas as $marca)
                                        <option @if($marcap = $marca->nombre) selected @endif value="{{ $marca->nombre }}">{{ $marca->nombre }}</option>
                                    @endforeach
                                    </select>
                                @error('marca')
                                <span class="invalid-feedback" role="alert">
                                <strong>Error</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                    
                    
                            @php
                                $subcategorias = DB::table('sub_categorias')->select('nombre')->get();
                            @endphp
                    
                            <div class="row mb-3">
                                <label for="subcategoria" class="col-md-4 col-form-label text-md-end">SubCategoria:</label>
                    
                                <div class="col-md-6">
                                    <select name="subcategoria" id="subcategoria"  wire:model='subcategory' required>
                                        @foreach ($subcategorias as $subcategoria)
                                            <option  @if($subcategory == $subcategoria->nombre) selected @endif value="{{ $subcategoria->nombre }}">{{ $subcategoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary" wire:click="update()" data-bs-dismiss="modal">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            
                            </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </table>
</div>