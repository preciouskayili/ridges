<?php
    // Prepare the rave request

    $request = [
        'tx_ref' => time(),
        'amount' => '1000',
        'currency' => 'NGN',
        'payment_options' => 'card',
        'redirect_url' => 'http://localhost/ecommerce/mart.php',
        'customer' => [
            'email' => 'preciouskayili@gmail.com',
            'name' => 'Precious'
        ],
        'meta' => [
            'price' => '1000'
        ],
        'customizations' => [
            'title' => 'Ridges',
            'description' => 'Payment for a product on ridges.com'
        ]
    ]

    // Create flutterwave endpoint
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.flutterwave.com/v3/payments",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURLOPT_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMEREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($request),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer FLWSECK-83276a70dce7e52fa434604d944c2a56-X',
            'Content-Type: application/json'
        )
        ));

        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
?>