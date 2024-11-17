<div id="tabla-admin">
    @php
        //$etiquetas = DB::table('etiquetas')->get();
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="pointer"><a wire:click="ordenarPorId()">Id</a></th>
                <th scope="col" class="pointer"><a wire:click="ordenarPorNombre()">Nombre</a></th>
                <th scope="col" class="pointer"><a wire:click="ordenarPorActivo()">Activo</a></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($etiquetas as $etiqueta)
                <tr>
                    <th scope="row">{{$etiqueta->id}}</th>
                    <td>{{ $etiqueta->nombre }}</td>
                    <td>{{ $etiqueta->activo }}</td>
                    <td>
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-editaret" wire:click="editaret({{$etiqueta->id}})">Editar</button>
                        <button class="btn btn-dark" wire:click="desHab({{$etiqueta->id}})">@if($etiqueta->activo) Deshabilitar @else Habilitar @endif</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <div class="modal fade" id="modal-editaret" wire:ignore.self tab-index="-1" aria-labelledby="modal-title-et" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-et">Etiqueta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" wire:submit.prevent="update">
                            @csrf

                            <div class="row mb-3">
                                <label for="nombre" class="col-md-4 col-form-label text-md-end">Id:</label>
                    
                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old ('id')}}" wire:model="ids" required disabled autocomplete="id" autofocus>
                    
                                    @error('id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Id invalido</strong>
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