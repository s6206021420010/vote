<?php
$phone = $_POST['phone'];
echo $rand =  rand(10000,99999);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://thsms.com/api/send-sms',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "sender": "Protected",
    "msisdn": ["'.$phone.'"],
    "message": "'.$rand.' "
}',
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC93d3cudGhzbXMuY29tXC9hcGkta2V5IiwiaWF0IjoxNjQ2MTIxOTQzLCJuYmYiOjE2NTA2MzcxOTIsImp0aSI6IlF1aVZzUkEzQU1MQVlTZW0iLCJzdWIiOjEwNTYyLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.D9siA1ybMBsDkiNuTstklXcL8kNUOYNJB21fuUFsUaM',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$response;
?>