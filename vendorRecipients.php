<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class VendorRecipients {
    var $recipientId;

    function __construct($recipientId){
      $this->recipientId = $recipientId;
    }

    //create a new recipient from a user to a new vendor
    function createRecipient($vendorToken, $userId, $post_data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$vendorToken/users/$userId", ['json' => $post_data]);
    }

    //get list of recipients from a vendor
    function getRecipient($vendorToken, $userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/recipients");
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['user']); // encodes back to json with out the user key
      return $data;
    }

    //get details of a recipient user from a vendor
    function getRecipientDetail($vendorToken, $userId, $recipientId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/recipients/$recipientId");
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['user']); // encodes back to json with out the user key
      return $data;
    }

    //update datails of a recipient from put_data via recipient_id of auser belonging to a vendor
    function updateRecipient($vendorToken, $userId, $recipientId, $put_data){
      $response = clientCreator::getInstance()->request('PUT',"vendors/$vendorToken/users/$userId/recipients/$recipientId", ['json' => $put_data]);
    }

    //delete a recipient from put_data via recipient_id of auser belonging to a vendor
    function deleteRecipient($vendorToken, $userId, $recipientId){
      $response = clientCreator::getInstance()->request('DELETE',"vendors/$vendorToken/users/$userId/recipients/$recipientId");
    }

  }//close VendorRecipient class

?>
