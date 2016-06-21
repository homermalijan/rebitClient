<?php
  use GuzzleHttp\Client;
  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  $vendorToken = 'xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X';

  $vendors = new GuzzleHttp\Client([
    'base_uri' => 'https://rebit.ph/api/v1/',
  ]);

  $response = $vendors->request('GET',"vendors/${vendorToken}");
  $response = $vendors->request('PUT',"vendors/${vendorToken}");

  echo "heller\n";
?>
