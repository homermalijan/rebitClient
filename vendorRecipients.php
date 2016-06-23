<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class VendorRecipients {
    var $remittanceId;

    function __construct($remittanceId){
      $this->remittanceId = $remittanceId;
    }

    function showRemittances($vendorToken, $userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances");
      echo $response->getBody()."\n\n\n";
    }

    function showRemittanceInfo($vendorToken, $userId, $remittanceId){
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances/$remittanceId");
      $body = json_decode($response->getBody(), true);
      $body = json_encode($body['recipient']);
      echo $body;
    }
  }

?>
