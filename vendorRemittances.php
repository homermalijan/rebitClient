<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class VendorRemittances {
    var $remittanceId;

    function __construct($remittanceId){
      $this->remittanceId = $remittanceId;
    }

    function showRemittances($vendorToken, $userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances");
      $response = json_decode($response->getBody(), true);
      $response = json_encode($response['remittance_ids']);
      return $response;
    }

    function showRemittanceInfo($vendorToken, $userId, $remittanceId){
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances/$remittanceId");
      $response = json_decode($response->getBody(), true);
      $response = json_encode($response['recipient']);
      return $response;
    }
  }
?>
