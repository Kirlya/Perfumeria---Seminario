<?php

namespace App\Http\Controllers;

use MercadoPago\Client\Payment\PaymentClient;
use MercadoPago\Client\Common\RequestOptions;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\Exceptions\MPApiException;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

class MercadoPagoController extends Controller
{
    public $envio;
    public function __construct(){
      MercadoPagoConfig::setAccessToken('TEST-2773717888206115-102717-f5a127ac2e5593e85082c0c2e4390240-1228439040');
      MercadoPagoConfig::setRuntimeEnviroment(MercadoPagoConfig::LOCAL);
        //$this->envio = $request;
    }

    public function crearPreferencia(Request $request)
    {
        $paymentMethods = [
         "excluded_payment_methods" => [],
          "installments" => 1,
          "default_installments" => 1

      ];

      $items = [
        [
            "id" => "item-ID-1234",
            "title" => "Mi producto",
            "currency_id" => "BRL",
            "picture_url" => "https://www.mercadopago.com/org-img/MP3/home/logomp3.gif",
            "description" => "Descrição do Item",
            "category_id" => "art",
            "quantity" => 1,
            "unit_price" => 75.76
        ]
    ];


        $backUrls = [

          'success' => route('home'),
          'failure' => route('menu-admin')

      ];

        $datos = [
          "items" => $items,
          "payer" => $request->get('payer'),
          "payment_methods" => $paymentMethods,
          "back_urls" => $backUrls,
          "statement_descriptor" => "TIENDA ONLINE",
          "external_reference" => "1234567890",
          "expires" => false,
          "auto_return" => 'approved',

      ];
      return $datos;
  }

    public function comprobante($id){
        return view('pagos.pago-comprobante',['id' => $id]);
    }

    

    public function comprar(Request $request){
        $unique = Str::random(40);
        $client = new PaymentClient();
        $request_options = new RequestOptions();
        $request_options->setCustomHeaders(["X-Idempotency-Key:".$unique]);
        $precio_total = DB::table('productos_carritos')->join('productos','productos_carritos.producto_id','productos.codigo')->where('productos_carritos.usuario_id',Auth::id())->value(DB::raw('sum(productos_carritos.cantidad * productos.precio) as precio_total')); 
     

          try{
            $payment = $client->create([
                "transaction_amount" => intval($precio_total),
                "token" => $request->get('token'),
                "installments" => $request->get('installments'),
                "payment_method_id" => $request->get('payment_method_id'),
                "issuer_id" => $request->get('issuer_id'),
                "payer" => $request->get('payer')
              ], $request_options);
              //dd($request); //rejected o confirmed?
            return (response()->json([$payment]));
         } catch (MPApiException $error) {
            return response()->json([
                'error' => $error->getApiResponse()->getContent(),
            ], 500);
        } catch (Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    /*
    public function comprar(Request $request){
        $unique = Str::random(40);
        $client = new PreferenceClient();
        $request_options = new RequestOptions();
        $request_options->setCustomHeaders(["X-Idempotency-Key:".$unique]);
        
        $request_data = $this->crearPreferencia($request);
        

        //{"message":"invalid card_token_id","status":400,"error":"bad_request","cause":[{"description":"invalid card_token_id","code":"E214"}]}



      //dd($createRequest);
      try{
        $preference = $client->create($request_data, $request_options);
          return response()->json([
            'id' => $preference->id,
            'init_point' => $preference->init_point,
        ]);
    } catch (MPApiException $error) {
        return response()->json([
            'error' => $error->getApiResponse()->getContent(),
        ], 500);
    } catch (Exception $e) {
        return response()->json([
            'error' => $e->getMessage(),
        ], 500);
    }
      
          

          
    }   */ 
}
