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
      return $data;
    }

    function updateUser ($param) {  //updates user given a valid user token
      $response = clientCreator::getInstance()->request('PUT', "user", ['json' => $param]);
      echo $response->getStatusCode();
    }
  }

  $newUser = new Users ('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');  //new user
  $newUser->getUser();
  $put_data = array(  //sample data
    'user' => array(
      'first_name'=> 'Luis',
      'last_name'=>  'Buenaventura',
      'mobile'=>     '+639175551111',
      'address'=>    '251 Salcedo St., Legaspi Village',
      'city'=>       'Makati City'
    )
  );
  $newUser->updateUser($put_data);

?>
