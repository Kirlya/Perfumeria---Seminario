<html>
  
    <head>
      <script src="https://sdk.mercadopago.com/js/v2"></script>
      <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/0763a21c1e.js" crossorigin="anonymous"></script>
      
    </head>
    <body>
      <div style="display:flex; flex-direction:column;">
        <div id="statusScreenBrick_container" ></div>
        <a class="btn btn-primary" style="align-self: center" href="{{route('home')}} ">Volver</a>
      </div>
      
      <script>
        var id = "<?php echo $id; ?>";
        console.log(id);
        const mp = new MercadoPago('TEST-4373d0db-6cfe-4857-b6a1-a1d702dd8b7d', { // Add your public key credential
          locale: 'es'
        });
        const bricksBuilder = mp.bricks();
        const renderStatusScreenBrick = async (bricksBuilder) => {
          const settings = {
            initialization: {
              paymentId: id, // Payment identifier, from which the status will be checked
            },
            customization: {
              visual: {
                hideStatusDetails: true,
                hideTransactionDate: true,
                style: {
                  theme: 'default', // 'default' | 'dark' | 'bootstrap' | 'flat'
                }
              },
              
            },
            callbacks: {
              onReady: () => {
                // Callback called when Brick is ready
              },
              onError: (error) => {
                // Callback called for all Brick error cases
              },
            },
          };
          window.statusScreenBrickController = await bricksBuilder.create('statusScreen', 'statusScreenBrick_container', settings);
        };
        renderStatusScreenBrick(bricksBuilder);
      </script>
    </body>
    </html>