<div id="tabla-admin">
    @php
        use App\Models\Subcategoria;
        use App\Models\Categoria;
        //$subcategorias = SubCategoria::all();
        $subcategorias = DB::table('sub_categorias')->get();
    @endphp
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Categoria</th>
                <th scope="col">Activo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategorias as $subcategoria)
                <tr>
                    <th scope="row">{{$subcategoria->id}}</th>
                    <td>{{ $subcategoria->nombre }}</td>
                    <td>{{ $subcategoria->categoria_id }}</td>
                    <td>{{ $subcategoria->activo }}</td>

                    <td>
                        <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-editarsubc" wire:click="editsubc({{$subcategoria->id}})">Editar</button>
                        <button class="btn btn-dark" wire:click="desHab({{$subcategoria->id}})">@if($subcategoria->activo) Deshabilitar @else Habilitar @endif</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <div class="modal fade" id="modal-editarsubc" wire:ignore.self tab-index="-1" aria-labelledby="modal-title-e" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-e">SubCategoria</h5>
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
                    
                            @php
                                $categorias = Categoria::all();
                            @endphp
                    
                            <div class="row mb-3">
                                <label for="nombre" class="col-md-4 col-form-label text-md-end">Categoria:</label>
                    
                                <div class="col-md-6">
                                    <select name="categoria" id="categoria" value="{{old('categoria')}}" wire:model='category' required>
                                        @foreach ($categorias as $categoria)
                                            <option  @if($category == $categoria->nombre) selected @endif value="{{ $categoria->nombre }}">{{ $categoria->nombre }}</option>
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


<!--
<script>
    document.addEventListener('livewire:init', function () {
    Livewire.on('editsubc', function () {
        var modalElement = document.getElementById('modal-editarsubc');
        if (modalElement) {
            var myModal = new bootstrap.Modal(modalElement);
            myModal.show();
        }
    });
});
</script> -->

</div>


