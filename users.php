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
?>
