<?php
  use GuzzleHttp\Client;
  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';


  $recipients = new Client([
    'base_uri' => 'https://rebit.ph/api/v1/',

  ]);

  $response = $recipients->request('POST','recipients');
  $response = $recipients->request('GET','recipients');
  $response = $recipients->request('GET','recipients/xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  $response = $recipients->request('PUT','recipients/xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  $response = $recipients->request('DELETE','recipients/xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');

  echo "heller\n";
?>
