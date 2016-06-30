<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class Recipient {
    var $vendorToken;

    function __construct($vendorToken) {
      $this->vendorToken = $vendorToken;
    }

    function testing($data) {
      $prevFunct = debug_backtrace()[1]['function'];
      if (strcmp($prevFunct, 'save') == 0){
        if (empty($data['recipient']))
            return ('ERROR: MISSING RECIPIENT HASH')."\n";
        else if (empty($data['recipient']['first_name']))
            return ('ERROR: MISSING FIRST NAME')."\n";
        else if (empty($data['recipient']['last_name']))
            return ('ERROR: MISSING LAST NAME')."\n";
        else if (empty($data['recipient']['email']))
            return ('ERROR: MISSING EMAIL')."\n";
        else if (!filter_var($data['recipient']['email'], FILTER_VALIDATE_EMAIL))
            return ('ERROR: INVALID EMAIL')."\n";
        else if (empty($data['recipient']['mobile']))
            return ('ERROR: MISSING MOBILE')."\n";
      } else if (strcmp($prevFunct, 'update') == 0) {
        if (empty($data['recipient']))
            return ('ERROR: MISSING RECIPIENT HASH')."\n";
        else if (empty($data['recipient']['first_name']))
            return ('ERROR: MISSING FIRST NAME')."\n";
        else if (empty($data['recipient']['last_name']))
            return ('ERROR: MISSING LAST NAME')."\n";
        else if (empty($data['recipient']['email']))
            return ('ERROR: MISSING EMAIL')."\n";
        else if (!filter_var($data['recipient']['email'], FILTER_VALIDATE_EMAIL))
            return ('ERROR: INVALID EMAIL')."\n";
        else if (empty($data['recipient']['mobile']))
            return ('ERROR: MISSING MOBILE')."\n";
      }
    }

    //get details of a recipient user from a vendor
    function showInfo($userId, $recipientId) {
      try{
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/recipients/$recipientId");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['recipient']);
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
        $response = json_decode($response->getBody(), true);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)."\n";
        return $errMessage;
      }
    }//close show

    //create a new recipient from a user to a new vendor
    function save($userId, $post_data) {
      if(!$test = $this->testing($data)) {
        $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/recipients", ['json' => $post_data]);
        return $response->getBody();
      }
      return $test;

    }//close save

    //update datails of a recipient from put_data via recipient_id of auser belonging to a vendor
    function update($userId, $recipientId, $put_data) {
      if(!$this->testing($data)) {
        $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId/recipients/$recipientId", ['json' => $put_data]);
        return $response->getBody();
      }
      return $this->testing($data);
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
