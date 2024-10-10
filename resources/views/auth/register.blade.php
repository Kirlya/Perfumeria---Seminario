<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <title>Perfumeria Register</title>
</head>
<style>
    html,body{
        height: 100%;
        margin: 0;
    }
</style>
<body>
    <div class="container form-container">
        <h1>Perfumeria Login</h1>
        <form action="{{ route('register') }}" method="POST">
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

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</body>
</html>