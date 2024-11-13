@extends('layouts.adminlayout')

@section('content')
    
    <h2>SubCategorias</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-crearsubc">Crear SubCategoria</button>
    
    
    <div class="modal fade" id="modal-crearsubc" tab-index="-1" aria-labelledby="modal-title-s" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-s">SubCategoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('subcategoria.store')}}" method="POST">
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
                
                        @php
                            use App\Models\Categoria;
                            $categorias = Categoria::all();
                        @endphp
                
                        <div class="row mb-3">
                            <label for="nombre" class="col-md-4 col-form-label text-md-end">Categoria:</label>
                
                            <div class="col-md-6">
                                <select name="categoria" id="categoria" value="{{old('categoria')}}" required>
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
                                    @endforeach
                                </select>
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
    


    <livewire:adminsubcategoria />
    
    


@endsection