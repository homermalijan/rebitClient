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
			//return json object
			return $data;
		}//close getVendor

    //update vendor attributes with given params
    function  updateVendor($put_data) {
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken", ['json' => $put_data]);
    }

    //return all users associated with this vendor
    function getUsers() {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users");
      return $response->getBody();
    }

    //return specific user associated with this vendor
    function getUser($userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId");
      $body = json_decode($response->getBody(), true);
      $data = json_encode($body['user']);
      return $data;
    }

    //return specific user associated with this vendor via given email
    function getUserByEmail($userEmail) {
      $userEmail = str_replace('@', '%40', $userEmail);
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/find_by_email?email=$userEmail");
      $body = json_decode($response->getBody(), true);
      $data = json_encode($body['user']);
      return $data;

    }

    //--------ISSUES HERE--------
    function uploadPhoto($userId, $encodedImage){
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/data=>image/jpg;base64".$encodedImage);
      echo $response->getStatusCode();
    }
    //---------------------------

    function updateUser($userId, $put_data){
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId", ['json' => $put_data]);
    }

    function addUser($post_data){
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users", ['json' => $post_data]);
      echo $response->getStatusCode();
    }



	}//close class

//close main php
?>
