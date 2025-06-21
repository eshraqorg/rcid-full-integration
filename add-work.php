<?php
$access_token = $_GET['access_token'];
$orcid_id = $_GET['orcid'];
$work = [
  'title'=> ['title'=>['value'=>'Your Title']],
  'type'=>'journal-article',
  'external-ids'=>['external-id'=>[['external-id-type'=>'doi','external-id-value'=>'10.1234/example','external-id-relationship'=>'self']]]
];
$ch = curl_init("https://api.orcid.org/v3.0/$orcid_id/work");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
  "Authorization: Bearer $access_token",
  "Content-Type: application/vnd.orcid+json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($work));
$res = curl_exec($ch);
curl_close($ch);
header('Content-Type: application/json');
echo $res;
