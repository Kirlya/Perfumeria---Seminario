<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
  <script src="https://sdk.mercadopago.com/js/v2"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Perfumeria</title>
</head>
<body>
            
<div id="cardPaymentBrick_container"></div>


<script>
  const mp = new MercadoPago('TEST-4373d0db-6cfe-4857-b6a1-a1d702dd8b7d',{
     locale: 'es-AR'
  });
  const bricksBuilder = mp.bricks();
  const renderCardPaymentBrick = async (bricksBuilder) => {
  const settings = {
    initialization: {
              amount: 100, // monto a ser pago
              payer: {
                email: "",
              },
            },
    customization : {
      paymentMethods: {
            creditCard: "all",
										debitCard: "all",
										ticket: "all",
										bankTransfer: "all",
										atm: "all",
										wallet_purchase: "all",
            maxInstallments: 1
          },
    },
   callbacks: {
     onReady: () => {
       /*
         Callback llamado cuando Brick está listo.
         Aquí puedes ocultar cargamentos de su sitio, por ejemplo.
       */
     },
     onSubmit: (formData) => {
      console.log('por aqui');
      console.log(JSON.stringify(formData));
       // callback llamado al hacer clic en el botón enviar datos
       /*
       return new Promise((resolve, reject) => {
         fetch('/comprar', {
           method: 'POST',
           headers: {
             'Content-Type': 'application/json',
             'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
           },
           body: JSON.stringify(formData),
         }).then((response) =>{
            console.log('prueba');
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // Asegúrate de capturar el JSON
            }
           ).then((response) => {
             // recibir el resultado del pago
             
             resolve("done");
           }).catch((error) => {

            console.log(response);
             // manejar la respuesta de error al intentar crear el pago
             reject();
           });
       });
       console.log('terminado');*/
       fetch('/comprar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(formData)
            })
            .then((response) => {
                      // recibir el resultado del pago
                      //console.log(response);
                    })
                    .catch((error) => {
                      // tratar respuesta de error al intentar crear el pago
                      console.error(error);
                    })
                },
     onError: (error) => {
       // callback llamado para todos los casos de error de Brick
       console.error(error);
     },
   },
  };
  window.cardPaymentBrickController = await bricksBuilder.create(
   'cardPayment',
   'cardPaymentBrick_container',
   settings,
  );  
};
renderCardPaymentBrick(bricksBuilder);

</script>

</body>
</html>
  