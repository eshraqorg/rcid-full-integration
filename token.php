<?php
$client_id = 'APP-332C9Q50ROWJ9DX0';
$client_secret = '52347d17-61a7-4abd-aeb2-98b5d1542e74';
$redirect_uri = 'https://<YOUR_VERCEL_DOMAIN>/callback.html';
$code = $_GET['code'] ?? '';

$data = [
  'client_id'=>$client_id,
  'client_secret'=>$client_secret,
  'grant_type'=>'authorization_code',
  'code'=>$code,
  'redirect_uri'=>$redirect_uri
];

$ch = curl_init('https://orcid.org/oauth/token');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
$response = curl_exec($ch);
curl_close($ch);
$res = json_decode($response,true);
header('Content-Type: application/json');
echo $response;
