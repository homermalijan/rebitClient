<?php
  use GuzzleHttp\Client;
  use Guzzle\Http\EntityBody;
  use Guzzle\Http\Message\Request;
  use Guzzle\Http\Message\Response;
  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  $vendorToken = 'xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X';

  $vendors = new GuzzleHttp\Client([
    'base_uri' => 'https://rebit.ph/api/v1/',
  ]);

  $request = $vendors->get("vendors/${vendorToken}");
  $response = $request->send();
  //$response = $vendors->request('GET',"vendors/${vendorToken}");
  //echo "$response";
  //$response = $vendors->request('PUT',"vendors/${vendorToken}");

  echo "heller\n";
?>
