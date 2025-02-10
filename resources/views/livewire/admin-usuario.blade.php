<div id="tabla-admin">
    @php
        //$usuarios = DB::table('usuarios')->get();
    @endphp
    <!-- Aca deberia estar el filtro la busqueda y el orden -->

    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="pointer"><a wire:click="ordenarPorEmail()">Email</a></th>
                <th scope="col">Nombre</th>
                <th scope="col" class="pointer"><a wire:click="ordenarPorApellido()">Apellido</a></th>
                <th scope="col" class="pointer"><a wire:click="ordenarPorActivo()">Activo</a></th>
                <th scope="col" class="pointer"><a wire:click="ordenarPorRol()">Rol</a></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                @php
                $rol = DB::table('usuarios')->join('roles','usuarios.roles_id','=','roles.id')->where('usuarios.email','=',$usuario->email)->value('roles.name');
                @endphp
                <tr>
                    <th scope="row">{{ $usuario->email }}</th>
                    <td>{{ $usuario->nombre }}</td>
                    <td>{{ $usuario->apellido }}</td>
                    <td>{{ $usuario->activo }}</td>
                    <td>{{ $rol }}</td>
                    <td>
                        @can('editar-usuario')
                            @if($usuario->id != Auth::id())
                            <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-editarusu" wire:click="editarusu({{json_encode($usuario->email)}})">Editar Rol</button>
                            <button class="btn btn-dark" wire:click="desHab({{json_encode($usuario->email)}})">@if($usuario->activo) Deshabilitar @else Habilitar @endif</button>
                            @endif
                        @endcan
                    </td>    
                </tr>
            @endforeach
        </tbody>
        <div class="modal fade" id="modal-editarusu" wire:ignore.self tab-index="-1" aria-labelledby="modal-title-u" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title-u">Usuario</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" wire:submit.prevent="update">
                            @csrf

                            <div class="row mb-3">
                                <label for="correo" class="col-md-4 col-form-label text-md-end">Correo:</label>
                    
                                <div class="col-md-6">
                                    <input id="id" type="text" class="form-control @error('correo') is-invalid @enderror" name="correo"  wire:model="correo" required disabled autocomplete="correo" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre:</label>
                    
                                <div class="col-md-6">
                                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" wire:model="nombre" disabled required autocomplete="nombre" autofocus>
                                    @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Nombre invalido</strong>
                                    </span>
                                @enderror
                                
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="apellido" class="col-md-4 col-form-label text-md-end">Apellido:</label>
                    
                                <div class="col-md-6">
                                    <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" wire:model="apellido" disabled required autocomplete="nombre" autofocus>
                                    @error('apellido')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Apellido invalido</strong>
                                    </span>
                                @enderror
                                
                                </div>
                            </div>
                    
                            @php
                                $roles = DB::table('roles')->get();
                            @endphp
                    
                        <div class="row mb-3">
                            <label for="rol" class="col-md-4 col-form-label text-md-end">Rol:</label>
            
                            <div class="col-md-6">
                                <select name="rol" id="rol" wire:model='role'>
                                    @foreach ($roles as $rol)
                                        @if($rol->name != 'Visitante')
                                        <option @if($role == $rol->name) selected @endif value="{{$rol->name}}">
                                            {{$rol->name}}
                                        </option>
                                        @endif
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