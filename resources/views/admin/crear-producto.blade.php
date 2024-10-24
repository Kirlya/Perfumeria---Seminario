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
    <a href="{{route('admin-productos')}}"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
    <div class="container form-container">
        
        <form action="{{route('crear-producto')}}" method="POST" enctype="multipart/form-data">
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
            <label for="descripcion" class="col-md-4 col-form-label text-md-end">Descripcion:</label>

            <div class="col-md-6">
                <input id="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" name="descripcion" value="{{ old('descripcion') }}" autocomplete="descripcion" autofocus>
            </div>
        </div>

        <div class="row mb-3">
            <label for="precio" class="col-md-4 col-form-label text-md-end">Precio:</label>

            <div class="col-md-6">
                <input id="precio" type="number" class="form-control @error('precio') is-invalid @enderror" name="precio" value="{{ old('precio') }}" required autocomplete="precio" autofocus>

                @error('precio')
                    <span class="invalid-feedback" role="alert">
                        <strong>Precio invalido</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="cantidad" class="col-md-4 col-form-label text-md-end">Cantidad:</label>

            <div class="col-md-6">
                <input id="cantidad" type="number" class="form-control @error('nombre') is-invalid @enderror" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad" autofocus>

                @error('cantidad')
                    <span class="invalid-feedback" role="alert">
                        <strong>Cantidad invalida</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="nombre" class="col-md-4 col-form-label text-md-end">Imagen:</label>

            <div class="col-md-6">
                <input id="imagen" type="file" class="form-control @error('imagen') is-invalid @enderror" name="imagen" value="{{ old('imagen') }}" accept="image/*" required autocomplete="imagen" autofocus>

                @error('imagen')
                    <span class="invalid-feedback" role="alert">
                        <strong>Error en la imagen</strong>
                    </span>
                @enderror
            </div>
        </div>

        @php
         $marcas = DB::table('marcas')->select('nombre')->get();   
        @endphp
        <div class="row mb-3">
            <label for="marca" class="col-md-4 col-form-label text-md-end">Marca:</label>

            <div class="col-md-6">
                <select name="marca" id="marca" value="{{old('marca')}}" required>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->nombre }}">{{ $marca->nombre }}</option>
                    @endforeach
                </select>
                @error('marca')
                    <span class="invalid-feedback" role="alert">
                        <strong>Error</strong>
                    </span>
                @enderror
            </div>
        </div>


        @php
         $subcategorias = DB::table('sub_categorias')->select('nombre')->get(); 
        @endphp
        <div class="row mb-3">
            <label for="subcategoria" class="col-md-4 col-form-label text-md-end">SubCategoria:</label>

            <div class="col-md-6">
                <select name="subcategoria" id="subcategoria" value="{{old('Subcategoria')}}" required>
                    @foreach ($subcategorias as $subcategoria)
                        <option value="{{ $subcategoria->nombre }}">{{ $subcategoria->nombre }}</option>
                    @endforeach
                </select>
                @error('sub')
                    <span class="invalid-feedback" role="alert">
                        <strong>Error</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Crear
                </button>
            </div>
        </div>

        </form>
    </div>

    </form>
    
</body>
</html>