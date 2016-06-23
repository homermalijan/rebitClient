<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';


	class Vendors {
		var $vendorToken; 		//vendor id

		//constructor
		function __construct($vendorToken){
			//initialize vendor token from parameter received
			$this->vendorToken = $vendorToken;
		}//close constructor

		//get vendor details based on vendorToken
		function getVendor() {
			$response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken");
			$body = json_decode($response->getBody(), true);
			$data = json_encode($body['vendor']);
      echo $data;
			//return json object
			return $data;
		}//close getVendor

    function  updateVendor($param) {
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken", ['json' => $param]);
      echo "\n".$response->getStatusCode()."\n";
    }

    function getUsers() {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users");

      return $response->getBody();
    }

    function getUser($userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId");
      $body = json_decode($response->getBody(), true);
      $data = json_encode($body['user']);

      echo $data;
    }

    function getUserByEmail($userEmail) {
      $userEmail = str_replace("@", "%40", $userEmail);
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/find_by_email?email=$userEmail");
      $body = json_decode($response->getBody(), true);
      $data = json_encode($body['user']);

      echo $data;
    }
	}//close class


//=========================================================================================================================
  $newVendor = new Vendors('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  // $newVendor->getVendor();
  // $put_data = array(
  //   'vendor' => array(
  //     'id'=> 1,
  //     'name'=> 'Bit',
  //     'url'=> 'http://www.example.com',
  //     'logo_url'=> 'http://www.example.com/logo.jpg',
  //     'phone'=> '90000000',
  //     'email'=> 'hello@example.com',
  //     'active'=> true,
  //     'user_ids'=> [
  //       1,
  //       2,
  //       3
  //     ]
  //   )
  // );
  //
  // $newVendor->updateVendor(json_encode($put_data));
  // $newVendor->getUsers();
  // $newVendor->getUser(10876);
  $newVendor->getUserByEmail("jomel150@yahoo.com");


//=========================================================================================================================


//close main php
?>
