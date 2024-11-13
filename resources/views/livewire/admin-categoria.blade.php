<div id="tabla-admin">
    @php
        use App\Models\Subcategoria;
        use App\Models\Categoria;
        //$subcategorias = SubCategoria::all();
        $categorias = DB::table('categorias')->get();
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Activo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <th scope="row">{{$categoria->id}}</th>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->activo }}</td>

                    <td><button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-editarc" wire:click="editc({{$categoria->id}})">Editar</button>
                        <button class="btn btn-dark" wire:click="desHab({{$categoria->id}})">@if($categoria->activo) Deshabilitar @else Habilitar @endif</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <div class="modal fade" id="modal-editarc" wire:ignore.self tab-index="-1" aria-labelledby="modal-title-e" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-e">Categoria</h5>
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