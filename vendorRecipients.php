<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class VendorRecipients {
    var $recipientId;

    function __construct($recipientId){
      $this->recipientId = $recipientId;
    }

    function createRecipient($post_data, $vendorToken, $userId) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$vendorToken/users/$userId", ['json' => $post_data]);
      echo $response->getStatusCode();
    }

    function getRecipient($vendorToken, $userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/recipients");
      echo $response->getBody();
    }

    function getRecipientDetail($vendorToken, $userId, $recipientId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/recipients/$recipientId");
      echo $response->getStatusCode();
    }
  }
?>
