@extends('layouts.adminlayout2')

@section('content')
    
    <h2 class="marg-left marg-bottom">Etiquetas</h2>
    <a class="btn btn-dark marg-left marg-bottom btn-admin" data-bs-toggle="modal" data-bs-target="#modal-crearet">Crear Etiqueta</a>
    
    
    <div class="modal fade" id="modal-crearet" tab-index="-1" aria-labelledby="modal-title-et" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-et">Etiqueta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('etiqueta.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre:</label>
                
                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
                
                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Nombre invalido</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <livewire:adminetiqueta />
    
@endsection