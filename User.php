<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class User {
    var $userToken; //user token

    function __construct($userToken) {  //user constructor
      $this->userToken = $userToken;
    }

    //gets user given a valid user token
    function show() {
      $response = clientCreator::getInstance()->request('GET', "user?token=$this->userToken");
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['user']); // encodes back to json with out the user key
      return $response;
    }//close show

    //updates user given a valid user token
    function update($put_data) {
      $response = clientCreator::getInstance()->request('PUT', "user?token=$this->userToken", ['json' => $put_data]);
      return $response;
    }//close update

  }//close class user
?>
