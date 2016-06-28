<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';

  class Remittance {
    var $remittanceId;

    function __construct($remittanceId) {
      $this->remittanceId = $remittanceId;
    }//close constructor

    //show all remittances associated to a user
    function show($vendorToken, $userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances");
      $response = json_decode($response->getBody(), true);
      $response = json_encode($response['remittance_ids']);
      return $response."\n";
    }//close show

    //shows info of a remittance for a user associated to a vendor
    function showInfo($vendorToken, $userId, $remittanceId) {
      try {
        $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/remittances/$remittanceId");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['recipient']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close showInfo

    //creates a remmitance for a user associated to a vendor
    function save($vendorToken, $userId, $data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$vendorToken/users/$userId/remittances", ['json' => $data]);
      return $response->getBody();
    }//close save

    //deletes a remittance given a vendor token, user id, and remittance id
    function destroy($vendorToken, $userId, $remittanceId) {
      $response = clientCreator::getInstance()->request('DELETE',"vendors/$vendorToken/users/$userId/remittances/$remittanceId");
      return $response->getBody();
    }//close destroy

    //compute remmitance of for a user given a set of data
    function compute($vendorToken, $userId, $post_data){
      $response = clientCreator::getInstance()->request('POST',"vendors/$vendorToken/users/$userId/remittances/calculate", ['json' => $post_data]);
      return $response->getBody();
    }//close compute

  }//close class remittances
?>
