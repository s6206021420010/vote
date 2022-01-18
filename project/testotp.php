<?php
require_once __DIR__ . "/../src/thaibulksms-api/sms.php";

$apiKey = '2648ec90748d18a2a544848b4a28b01e';
$apiSecretKey = 'd75c67b191d3c4ee9be8b02035e58a4f';

$sms = new \THAIBULKSMS_API\SMS\SMS($apiKey, $apiSecretKey);

$body = [
    'msisdn' => '0927604466',
    'message' => 'บักหำแหล่',
    // 'sender' => '',
    // 'scheduled_delivery' => '',
    // 'force' => ''
];
$res = $sms->sendSMS($body);

if ($res->httpStatusCode == 201) {
    echo "Succes";
    var_dump($res);
} else {
    echo "Error";
    var_dump($res);
}
