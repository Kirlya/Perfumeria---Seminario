@extends('layouts.adminlayout')

@section('content')
    
    <h2>Marcas</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-crearm">Crear Marca</button>
    
    <div class="modal fade" id="modal-crearm" tab-index=-1 aria-labelledby="modal-title-m" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-m">Marca</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('marca.store')}}" method="POST">
                        @csrf
                
                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">Codigo:</label>
                
                            <div class="col-md-6">
                                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required autocomplete="nombre" autofocus>
                
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
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre' ) }}" required autocomplete="nombre" autofocus>
                
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Nombre invalido</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                
                        </form>
                </div>
            </div>
        </div>
    </div>

    
    <livewire:adminmarcas />

    
@endsection