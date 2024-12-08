<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
 <title>Perfumeria Laravel</title>
</head>
<body>
 <h1>Ventas</h1>
 <div>
    <table>
        <thead>
            <tr>
              <th scope="col">Factura</th>
              <th scope="col">Fecha</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($facturas as $factura)
            <tr>
              <th scope="row">{{$factura->N_Factura}}</th>
              <th>{{$factura->fecha}}</th>
              <th>{{$factura->total}}</th>
            </tr>
            @endforeach
          </tbody>
    </table>
 </div>
 <h1>Detalle de Ventas</h1>
 <div>
    <table>
        <thead>
            <tr>
              <th scope="col">Factura</th>
              <th scope="col">N Linea</th>
              <th scope="col">Fecha</th>
              <th scope="col">Producto</th>
              <th scope="col">Precio</th>
              <th scope="col">Cantidad</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ventas as $venta)
            <tr>
              <th scope="row">{{$venta->N_Factura}}</th>
              <th>{{$venta->N_Linea}}</th>
              <th>{{$venta->fecha}}</th>
              <th>{{$venta->cod_prod}}</th>
              <th>{{$venta->precio_unit}}</th>
              <th>{{$venta->cantidad}}</th>
            </tr>
            @endforeach
          </tbody>
    </table>
 </div>
 <div>
  <h1>Producto mas vendido</h1>
  <h3>Cantidad: {{$producto->total_cantidad}}</h3>
  <h3>Codigo: {{$producto->cod_prod}}</h3>
  <h3>Nombre: {{$producto->nombre}}</h3>
 </div>
</body>
</html>