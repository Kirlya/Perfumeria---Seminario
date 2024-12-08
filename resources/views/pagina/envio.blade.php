<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <title>Perfumeria</title>
</head>
<body style="padding: 2%">
    <h1>Envio</h1>
    <form action="{{route('tarjeta',$token)}}" method="POST" >
        @csrf
        <div class="mb-3">
            <label for="form-nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="form-nombre" name="nombre" aria-describedby="" required>
        </div>
        <div class="mb-3">
            <label for="form-apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="form-apellido" name="apellido" aria-describedby="" required>
        </div>
        <div class="mb-3">
          <label for="form-calle" class="form-label">Calle</label>
          <input type="text" class="form-control" id="form-calle" name="calle" aria-describedby="" required>
        </div>
        <div class="mb-3">
          <label for="form-numero" class="form-label">Numero</label>
          <input type="number" class="form-control" id="form-numero" name="numero" required>
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="form-barrio">Barrio:</label>
            <input type="text" class="form-control" name="barrio" id="form-barrio">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="form-dep">Departamento:</label>
            <input type="text" class="form-control" name="departamento" id="form-dep">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="form-piso">Piso:</label>
            <input type="text" class="form-control" name="piso" id="form-piso">
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="form-ciudad">Ciudad:</label>
            <input type="text" class="form-control" name="ciudad" id="form-ciudad" required>
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="form-prov">Provincia:</label>
            <input type="text" class="form-control" id="form-prov" name="provincia" required>
        </div>
        <div class="mb-3">
            <label class="form-check-label" for="form-cp">CP:</label>
            <input type="text" class="form-control" id="cp" name="cp" required>
        </div>
        <button type="submit" class="btn btn-primary">Siguiente</button>
      </form>
</body>
</html>