<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class VendorRecipients {
    var $recipientId;

    function __construct($recipientId) {
      $this->recipientId = $recipientId;
    }

    //create a new recipient from a user to a new vendor
    function createRecipient($vendorToken, $userId, $post_data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$vendorToken/users/$userId/recipients", ['json' => $post_data]);
      return $response->getBody();
    }

    //get list of recipients from a vendor
    function getRecipient($vendorToken, $userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/recipients");
      return $response->getBody();
    }

    //get details of a recipient user from a vendor
    function getRecipientDetail($vendorToken, $userId, $recipientId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/recipients/$recipientId");
      return $response->getBody();
    }

    //update datails of a recipient from put_data via recipient_id of auser belonging to a vendor
    function updateRecipient($vendorToken, $userId, $recipientId, $put_data) {
      $response = clientCreator::getInstance()->request('PUT',"vendors/$vendorToken/users/$userId/recipients/$recipientId", ['json' => $put_data]);
      return $response->getBody();
    }

    //*404*
    //delete a recipient from put_data via recipient_id of auser belonging to a vendor
    function deleteRecipient($vendorToken, $userId, $recipientId) {
      $response = clientCreator::getInstance()->request('DELETE',"vendors/$vendorToken/users/$userId/recipients/$recipientId");
      return $response->getBody();
    }

  }//close VendorRecipient class

?>
