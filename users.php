<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';

  class Users {
    var $userToken; //user token

    function __construct($userToken) {  //user constructor
      $this->userToken = $userToken;
    }

    function getUser () { //gets user given a valid user token
      $response = clientCreator::getInstance()->request('GET', "user?token=$this->userToken");
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['user']); // encodes back to json with out the user key
      echo $data;
    }

    function updateUser ($param) {  //updates user given a valid user token
      $response = clientCreator::getInstance()->request('PUT', "user?token=$this->userToken", ['json' => $param]);
      //echo $response->getStatusCode();
    }
  }

  $newUser = new Users ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');  //new user
//  $newUser->getUser();
  $put_data = array(  //sample data
    'user' => array(
      'first_name'=> 'JC Carlo',
      'last_name'=>  'Quintos',
      'mobile'=>     '+639179206511',
      'address'=>    '189 Mt Makiling St., Brgy. Palingon',
      'city'=>       'Calamba City'
    )
  );
  //$newUser->updateUser($put_data);
  $newUser->getUser();

?>
