<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/css/style.css">
    <title>Perfumeria</title>
</head>
<body>
    <a href="{{route('admin-marcas')}}"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
    <div class="container form-container">
    
        <form action="{{$marca->id? route('marca.update') : route('marca.store')}}" method="POST">
        @csrf

        <div class="row mb-3">
            <label for="nombre" class="col-md-4 col-form-label text-md-end">Codigo:</label>

            <div class="col-md-6">
                <input id="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" name="codigo" value="{{ old('codigo', optional($marca)->codigo ) }}" required autocomplete="nombre" autofocus>

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
                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre', optional($marca)->nombre ) }}" required autocomplete="nombre" autofocus>

                @error('nombre')
                    <span class="invalid-feedback" role="alert">
                        <strong>Nombre invalido</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{$marca->id? 'Actualizar' : 'Crear'}}
                </button>
            </div>
        </div>

        </form>
    </div>

    </form>
</body>
</html>