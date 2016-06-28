<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';

  class Recipient {
    var $recipientId;

    function __construct($recipientId) {
      $this->recipientId = $recipientId;
    }

    //get details of a recipient user from a vendor
    function showInfo($vendorToken, $userId, $recipientId) {
      try{
        $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/recipients/$recipientId");
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
          $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
          return $errMessage;
      }
    }//close showInfo

    //get list of recipients from a vendor
    function showAll($vendorToken, $userId) {
      try{
        $response = clientCreator::getInstance()->request('GET',"vendors/$vendorToken/users/$userId/recipients");
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close show

    //create a new recipient from a user to a new vendor
    function save($vendorToken, $userId, $post_data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$vendorToken/users/$userId/recipients", ['json' => $post_data]);
      return $response->getBody();
    }//close save

    //update datails of a recipient from put_data via recipient_id of auser belonging to a vendor
    function update($vendorToken, $userId, $recipientId, $put_data) {
      try{
        $response = clientCreator::getInstance()->request('PUT',"vendors/$vendorToken/users/$userId/recipients/$recipientId", ['json' => $put_data]);
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close update

    //*ISSUE: not yet tested*
    //delete a recipient from put_data via recipient_id of auser belonging to a vendor
    function destroy($vendorToken, $userId, $recipientId) {
      try{
        $response = clientCreator::getInstance()->request('DELETE',"vendors/$vendorToken/users/$userId/recipients/$recipientId");
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close destroy

  }//close VendorRecipient class

?>
