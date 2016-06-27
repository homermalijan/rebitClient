<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class VendorRemittances {
    var $remittanceId;

    function __construct($remittanceId) {
      $this->remittanceId = $remittanceId;
    }

    function showRemittances($vendorToken, $userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances");
      $response = json_decode($response->getBody(), true);
      $response = json_encode($response['remittance_ids']);
      echo $response."\n";
    }

    function showRemittanceInfo($vendorToken, $userId, $remittanceId) {  //shows a remittance's info given a vendor token, user id, and remittance id
      try {
        $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances/$remittanceId");
        $response = json_decode($response->getBody(), true);    //json to string
        $response = json_encode($response['recipient']);        //string to json without 'recipient' key
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }

    function saveRemittance($vendorToken, $userId, $data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$vendorToken/users/$userId/remittances", ['json' => $data]);
      echo $response->getBody();
    }

    function deleteRemittance($vendorToken, $userId, $remittanceId) {  //deletes a remittance given a vendor token, user id, and remittance id
      $response = clientCreator::getInstance()->request('DELETE',"vendors/$vendorToken/users/$userId/remittances/$remittanceId");
      echo $response->getStatusCode()."\n";   // 200
    }
  }

?>
