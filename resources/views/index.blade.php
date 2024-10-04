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
    <title>Perfumeria</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark container-fluid">
        <a class="navbar-brand" href="#" id="logo">Logo</a>
        <div class="container align-items-center">
            <ul class="navbar-nav row">
                <li class="nav-item col-auto"><a href="" class="nav-link">Productos</a></li>
                <li class="nav-item col-auto"><a href="" class="nav-link">Ofertas</a></li>
                <li class="nav-item col-auto"><a href="" class="nav-link">Contacto</a></li>
            </ul>
        </div>
        
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-dark" type="submit">Buscar</button>
        </form>
        <a id="login-icon" href="{{ route('login') }}">
            <i class="fa-solid fa-user fa-lg" style="color: #ffffff;"></i>
        </a>     
    </nav>    
    <div class="lista-productos container-fluid">

    </div>
    <footer>

    </footer>
</body>
</html>