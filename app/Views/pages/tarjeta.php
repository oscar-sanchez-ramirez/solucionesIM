<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Tarjeta</h1>

    <?php

    require '../vendor/autoload.php';

    \Stripe\Stripe::setApiKey("sk_test_wThLvIsqNPNfofKheRhOjHJt002ThKiwBj");

    $token = $_POST["stripeToken"];

    $charge = \Stripe\Charge::create([
        "amount" => $total,
        "currency" => "usd",
        "description" => "Pago en mi tienda...",
        "source" => $token
    ]);

    echo "<pre>", print_r($charge), "</pre>";
    ?>

</body>

</html>