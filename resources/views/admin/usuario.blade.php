@extends('layouts.adminlayout')

@section('content')
   
    <h2>Usuarios</h2>
    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#modal-crearusu">Crear Usuario</button>
    
    
    <div class="modal fade" id="modal-crearusu" tab-index="-1" aria-labelledby="modal-title-u" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title-u">Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{route('usuario.store') }}" method="POST">
                        @csrf
                    <div class="row mb-3">
                        <label for="nombre" class="col-md-4 col-form-label text-md-end">Nombre:</label>
            
                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre')}}" required autocomplete="nombre" autofocus>
            
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
                            <input id="apellido" type="text" class="form-control @error('apellido') is-invalid @enderror" name="apellido" value="{{ old('apellido') }}" required autocomplete="nombre" autofocus>
            
                            @error('apellido')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Apellido invalido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row mb-3">
                        <label for="dni" class="col-md-4 col-form-label text-md-end">Dni:</label>
            
                        <div class="col-md-6">
                            <input id="dni" type="number" class="form-control @error('dni') is-invalid @enderror" name="dni" value="{{ old('dni') }}" required autocomplete="dni" autofocus>
            
                            @error('dni')
                                <span class="invalid-feedback" role="alert">
                                    <strong>DNI invalido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
            
                    <div class="row mb-3">
                        <label for="telefono" class="col-md-4 col-form-label text-md-end">Telefono:</label>
            
                        <div class="col-md-6">
                            <input id="telefono" type="number" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ old('telefono') }}" required autocomplete="telefono">
            
                            @error('telefono')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Telefono invalido</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Email:</label>
            
                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Email invalido o ya registrado</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row mb-3">
                        <label for="contraseña" class="col-md-4 col-form-label text-md-end">Contraseña:</label>
            
                        <div class="col-md-6">
                            <input id="contraseña" type="password" class="form-control @error('contraseña') is-invalid @enderror" name="contraseña" required autocomplete="contraseña">
            
                            @error('contraseña')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Las contraseñas no coinciden</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
            
                    <div class="row mb-3">
                        <label for="contraseña-confirm" class="col-md-4 col-form-label text-md-end">Confirmar Contraseña:</label>
            
                        <div class="col-md-6">
                            <input id="contraseña-confirm" type="password" class="form-control" name="contraseña_confirmation" required autocomplete="contraseña">
                        </div>
                    </div>
            
                    @php
                        $roles = DB::table('roles')->get();
                    @endphp
            
                    <div class="row mb-3">
                        <label for="rol" class="col-md-4 col-form-label text-md-end">Rol:</label>
            
                        <div class="col-md-6">
                            <select name="rol" id="rol">
                                @foreach ($roles as $rol)
                                    @if($rol->name != 'Visitante')
                                    <option value="{{$rol->name}}">
                                        {{$rol->name}}
                                    </option>
                                    @endif
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

    <livewire:adminusuario />

@endsection