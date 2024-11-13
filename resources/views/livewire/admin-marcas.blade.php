
    @php
        $marcas = DB::table('marcas')->get();
    @endphp

    <div id="tabla-admin">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Codigo</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Activo</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($marcas as $marca)
                    <tr>
                        <th scope="row">{{ $marca->codigo }}</th>
                        <td>{{ $marca->nombre }}</td>
                        <td>{{ $marca->activo }}</td>
                        <td><button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-editarm" wire:click="editmarca({{json_encode($marca->codigo)}})">Editar</button>
                            <button class="btn btn-dark" wire:click="desHab({{json_encode($marca->codigo)}})">@if($marca->activo) Deshabilitar @else Habilitar @endif</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <div class="modal fade" id="modal-editarm" tab-index=-1 wire:ignore.self aria-labelledby="modal-title-m" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title-m">Marca</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="" wire:submit.prevent="update">
                                @csrf
                        
                                <div class="row mb-3">
                                    <label for="codigo" class="col-md-4 col-form-label text-md-end">Codigo:</label>
                        
                                    <div class="col-md-6">
                                        <input id="codigo" wire:model="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo') }}" required autocomplete="codigo" disabled autofocus>
                        
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
                                        <input id="nombre" wire:model="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre' ) }}" required autocomplete="nombre" autofocus>
                        
                                        @error('nombre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Nombre invalido</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                        
                                <button type="submit" class="btn btn-primary" wire:click="update()" data-bs-dismiss="modal">Guardar</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                
                        
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </table>
    </div>

