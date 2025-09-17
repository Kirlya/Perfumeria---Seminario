@extends('layouts.adminlayout2')

@section('content')

<h2 class="marg-bottom marg-left">Modelos</h2>
<a class="btn btn-dark btn-admin marg-left marg-bottom" data-bs-toggle="modal" data-bs-target="#modal-crearmod">Crear Modelo</a>

<div class="modal fade" id="modal-crearmod" tab-index="-1" aria-labelledby="modal-title-m" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title-m">Modelos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('modelos.store')}}" enctype="multipart/form-data" method="POST">
                    @csrf

                   


                    <div class="row mb-3">
                        <label for="atributo" class="col-md-4 col-form-label text-md-end">Atributo:</label>
            
                        <div class="col-md-6">
                            <input id="atributo" type="text" class="form-control @error('atributo') is-invalid @enderror" name="atributo" value="{{ old('atributo') }}" required autocomplete="atributo" autofocus>
            
                            @error('atributo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Atributo invalido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row mb-3">
                        <label for="valor" class="col-md-4 col-form-label text-md-end">Valor:</label>
            
                        <div class="col-md-6">
                            <input id="valor" type="text" class="form-control @error('valor') is-invalid @enderror" name="valor" value="{{ old('valor') }}" required autocomplete="valor" autofocus>
            
                            @error('valor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Valor invalido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                        <div class="row mb-3">
                            <label for="cantidad" class="col-md-4 col-form-label text-md-end">Cantidad:</label>
                
                            <div class="col-md-6">
                                <input id="cantidad" type="number" class="form-control @error('cantidad') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad" autofocus>
                
                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Cantidad invalido</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="producto" class="col-md-4 col-form-label text-md-end">Producto:</label>
                
                            <div class="col-md-6">
                                <livewire:busqProd />
                                @error('atributo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Producto invalido</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fotos" class="col-md-4 col-form-label text-md-end">Imagen:</label>
            
                            <div class="col-md-6">
                                <input type="file" name="images[]" accept="image/*" enctype="multipart/form-data" id="fotos" multiple>
                               
                                @error('atributo')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>Error con las imagenes</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- falta añadir fotos -->
                    
            
                    
                    
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    
                    </form>
            </div>
            </div>
        </div>
    </div>

    <livewire:verModelos />
    
@endsection