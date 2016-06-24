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
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['user']); // encodes back to json with out the user key
      return $data;
    }

    function showRemittanceInfo($vendorToken, $userId, $remittanceId){
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances/$remittanceId");
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['user']); // encodes back to json with out the user key
      return $data;
    }
  }
?>
