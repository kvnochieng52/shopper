<?php

$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.paysol.co.ke/paysol/',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('function' => 'customerPayBillOnline', 'payBillNumber' => '4087493', 'amount' => '1', 'accountReference' => 'BLL0511061128874', 'transactionDesc' => 'BLL0511061128874', 'phoneNumber' => '254713295853'),
    CURLOPT_HTTPHEADER => array(
        'Authorization: Bearer MTVlNmJkNDE1NWZiNDBiZTZlZTVmNjMwZDg5ZmNkMTU1NTRiOTM2MDBlY2U2ZmI2YjUwNGE4MWRmOWJjYTFkZA=='
    ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
