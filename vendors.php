<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

	class Vendors {
		var $vendorToken; 		//vendor id

		//constructor
		function __construct($vendorToken) {
			//initialize vendor token from parameter received
			$this->vendorToken = $vendorToken;

		}//close constructor

		//get vendor details based on vendorToken
		function getVendor() {
			$response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken");
			$body = json_decode($response->getBody(), true);
			$data = json_encode($body['vendor']);
			//return json object
			echo $data;
		}//close getVendor

    //update vendor attributes with given params
    function  updateVendor($put_data) {
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken", ['json' => $put_data]);
    }

    //return all users associated with this vendor
    function getUsers() {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users");
      echo $response->getBody();
    }

    //return specific user associated with this vendor
    function getUser($userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId");
      $body = json_decode($response->getBody(), true);
      $data = json_encode($body['user']);
      echo $data;
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
    //uploads new image for a user given a userId
    function uploadPhoto($userId, $encodedImage) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/data=>image/jpg;base64".$encodedImage);
    }
    //---------------------------

    //update user with given userId with given put_data
    function updateUser($userId, $put_data) {
      $response = clientCreator::getInstance()->request('PUT', "vendors/$this->vendorToken/users/$userId", ['json' => $put_data]);
      echo $response->getStatusCode();
    }

    function showOutgoingRemittances($userId) {
      $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/users/$userId/outgoing_remittances");
      echo $response->getBody();
    }

    //get details of a credit given a creditId
    function getCreditInfo($creditId, $get_data) {
      $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/credits/$creditId", ['json' => $get_data]);
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['credit']); // encodes back to json with out the user key
      return $data;
    }

    //get credit transaction of a given data
    function getCreditTransactions() {
      $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/credits");
      $body = json_decode($response->getBody(), true);  //decodes the resposnce body
      $data = json_encode($body['credit']); // encodes back to json with out the user key
      return $data;
    }

    //--------ISSUES HERE --------
    //updates password of a user given the old password, new password, and new password confirmation
    //new password and new password confirmation must match
    function updateUserPassword($userId, $old_password, $password, $password_confirmation){
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId/update_password", ['old_password' => $old_password], ['password' => $password], ['password_confirmation' => $password_confirmation]);
    }
    //---------------------------

    //add user to this vendor
    function addUser($post_data){
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users", ['json' => $post_data]);
    }
	}//close class

//close main php
?>
