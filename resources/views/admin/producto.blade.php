@extends('layouts.adminlayout2')

@section('content')
   
    <h2 class="marg-left marg-bottom">Productos</h2>
    <a class="btn btn-dark btn-admin marg-left marg-bottom" data-bs-toggle="modal" data-bs-target="#modal-crearp">Crear Producto</a>
    <div class="modal fade" id="modal-crearp" wire:ignore.self tab-index="-1" aria-labelledby="modal-title-pc" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-pc">Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('producto.store')}}" method="POST">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre:</label>
                
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}"  required autocomplete="nombre" autofocus>
                
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
                                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion"  autocomplete="descripcion" autofocus>
                            </div>
                        </div>
                
                        <div class="row mb-3">
                            <label for="precio" class="col-md-4 col-form-label text-md-end">Precio:</label>
                
                            <div class="col-md-6">
                                <input id="precio" type="number" class="form-control @error('precio') is-invalid @enderror" name="precio"  required autocomplete="precio" autofocus>
                
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
                                <input id="cantidad" type="number" class="form-control @error('nombre') is-invalid @enderror" name="cantidad"  required autocomplete="cantidad" autofocus>
                
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
                                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen' ) }}" accept="image/*" required autocomplete="imagen" autofocus>
                
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
                                <select name="marca" id="marca" value="{{old('marca')}}" required>
                                @foreach ($marcas as $marca)
                                    <option value="{{ $marca->nombre }}">{{ $marca->nombre }}</option>
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
                                <select name="subcategoria" id="subcategoria" required>
                                    @foreach ($subcategorias as $subcategoria)
                                        <option value="{{ $subcategoria->nombre }}">{{ $subcategoria->nombre }}</option>
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
    
    <livewire:adminproducto />
@endsection