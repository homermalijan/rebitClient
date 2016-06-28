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

    //gets user given a valid user token
    function show() {
      $response = clientCreator::getInstance()->request('GET', "user?token=$this->userToken");
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['user']); // encodes back to json with out the user key
      return $data;
    }

    //updates user given a valid user token
    function update($param) {
      $response = clientCreator::getInstance()->request('PUT', "user?token=$this->userToken", ['json' => $param]);
    }
  }//close class user
?>
