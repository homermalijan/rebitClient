<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';

  class Recipient {
    var $vendorToken;

    function __construct($vendorToken) {
      $this->vendorToken = $vendorToken;
    }

    //get details of a recipient user from a vendor
    function showInfo($userId, $recipientId) {
      try{
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/recipients/$recipientId");
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
          $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
          return $errMessage;
      }
    }//close showInfo

    //get list of recipients from a vendor
    function showAll($userId) {
      try{
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/recipients");
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close show

    //create a new recipient from a user to a new vendor
    function save($userId, $post_data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/recipients", ['json' => $post_data]);
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['recipient']); // encodes back to json with out the user key
      return $data;
    }//close save

    //update datails of a recipient from put_data via recipient_id of auser belonging to a vendor
    function update($userId, $recipientId, $put_data) {
      try{
        $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId/recipients/$recipientId", ['json' => $put_data]);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close update

    //*ISSUE: not yet tested*
    //delete a recipient from put_data via recipient_id of auser belonging to a vendor
    // function destroy($userId, $recipientId) {
    //   try{
    //     $response = clientCreator::getInstance()->request('DELETE',"vendors/$this->vendorToken/users/$userId/recipients/$recipientId");
    //     return $response->getBody();
    //   } catch(GuzzleHttp\Exception\ClientException $e) {
    //     $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
    //     return $errMessage;
    //   }
    // }//close destroy

  }//close VendorRecipient class
?>
