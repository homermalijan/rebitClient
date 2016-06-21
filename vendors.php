<?php
  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Request;
  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  $vendorToken = 'xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X';

  $vendors = new GuzzleHttp\Client([
    'base_uri' => 'https://rebit.ph/api/v1/',
  ]);

  $response = $vendors->request('GET',"vendors/${vendorToken}");
  $body = json_decode($response->getBody(), true);
  $data = json_encode($body['vendor'])."\n";
  echo $data;

?>
