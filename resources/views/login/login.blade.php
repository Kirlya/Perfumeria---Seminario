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
    <title>Perfumeria Login</title>
</head>
<style>
    html,body{
        height: 100%;
        margin: 0;
    }
</style>
<body>
    <div id="form-back">
        <a href="{{route('home')}}"><i class="fa-solid fa-arrow-left fa-2xl" style="color: #000000;"></i></a>
    </div>
    
    <div class="container form-container">
        <h1>Perfumeria Login</h1>
        <div class="form">
            <form action="{{route('login')}}" method="POST">
                @csrf
                <label for="">Correo</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>Correo incorrecto</strong>
                        </span>
                    @enderror
                <label for="">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Contraseña incorrecta</strong>
                                    </span>
                                @enderror
                <button type="submit">Iniciar Sesion</button>
            </form>
        </div>
        <div class="options-form">
            <a href="">Olvidaste tu contraseña?</a>
            <button><a style="text-decoration:none;color:black;" href="{{route('menu-registrar')}}">Crear Usuario</a></button>
        </div>
        
    </div>
</body>
</html>