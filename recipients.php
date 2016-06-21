<?php
  use GuzzleHttp\Client;
  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';


  $recipients = new Client([
    'base_uri' => 'https://rebit.ph/api/v1/',

  ]);

  $response = $recipients->request('POST','recipients');
  $response = $recipients->request('GET','recipients');
  $response = $recipients->request('GET','recipients/${id}');
  $response = $recipients->request('PUT','recipients/${id}');
  $response = $recipients->request('DELETE','recipients/${id}');

  echo "heller\n";
?>
