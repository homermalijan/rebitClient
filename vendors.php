<?php
  use GuzzleHttp\Client;
<<<<<<< HEAD
  use Guzzle\Http\EntityBody;
  use Guzzle\Http\Message\Request;
  use Guzzle\Http\Message\Response;
=======
  use GuzzleHttp\Psr7\Request;
>>>>>>> 5eacaefa1f079fde2ad254c4b73672c0638951fe
  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  $vendorToken = 'xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X';

  $vendors = new GuzzleHttp\Client([
    'base_uri' => 'https://rebit.ph/api/v1/',
  ]);

  $response = $vendors->request('GET',"vendors/${vendorToken}");
  $body = $response->getBody();

  echo $body."\n";
  echo $response->getStatusCode()."\n"; // 200
  echo $response->getReasonPhrase()."\n"; // OK
  echo $response->getProtocolVersion()."\n"; // 1.1

?>
