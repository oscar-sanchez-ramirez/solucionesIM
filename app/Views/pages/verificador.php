<?php 

//print_r($_GET); 

$ClientID = "ASklWPwGBMpjsM3h-ABxGjPgAZPy_AAncwUBNzJDK1TJemQJe5n3JL3JpTpdriAW79klve9apxPYcgym";
$Secret = "EKGkdIiqJPyPnkmk3y11l_ktC7hN3dJAMQibe5pwIY-i7E1LeHZ_68OpJYtxkpmmYqSa40QEGLu8KW71";

$Login = curl_init("https://api.sandbox.paypal.com/v1/oauth2/token");

curl_setopt($Login, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($Login, CURLOPT_USERPWD, $ClientID.":".$Secret);

curl_setopt($Login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

$Respuesta = curl_exec($Login);

//print_r($Respuesta); 

$objRespuesta = json_decode($Respuesta);

$AccessToken = $objRespuesta->access_token;



//print_r($AccessToken); 

//print_r($_GET['paymentID']);

$venta = curl_init("https://api.sandbox.paypal.com/v1/payments/payment/".$_GET['paymentID']);

curl_setopt($venta, CURLOPT_HTTPHEADER, array("Content-Type: application/json","Authorization: Bearer ".$AccessToken));

curl_setopt($venta, CURLOPT_RETURNTRANSFER, TRUE);


$RespuestaVenta = curl_exec($venta);

//print_r($RespuestaVenta);

$objDatosTransaccion = json_decode($RespuestaVenta);

//print_r($objDatosTransaccion->transactions[0]->custom);

$state = $objDatosTransaccion->state;
$email = $objDatosTransaccion->payer->payer_info->email;

$total = $objDatosTransaccion->transactions[0]->amount->total;
$currency = $objDatosTransaccion->transactions[0]->amount->currency;
$custom = $objDatosTransaccion->transactions[0]->custom;

//print_r($custom);

$clave= explode("#", $custom);

$SID = $clave[0];
$ClaveVenta = openssl_decrypt($clave[1], $CODE, $KEY);



curl_close($venta);
curl_close($Login);

//echo $ClaveVenta;

if($state == "approved"){
    $mensajePaypal = "<h3>Pago aprovado</h3>";
    echo $mensajePaypal."<br>";
    echo "Por la cantidad de: ".number_format($total, 2)." ".$currency;
}else{
    $mensajePaypal = "<h3>Hay un problema con su pago, no fue aprovado</h3>";
}
