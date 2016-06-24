<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

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
      return $response->getBody();
    }

    //return specific user associated with this vendor via given email
    function getUserByEmail($userEmail) {
      $userEmail = str_replace('@', '%40', $userEmail);
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/find_by_email?email=$userEmail");
      return $response->getBody();
    }

    //uploads new image for a user given a userId
    function uploadPhoto($userId, $encodedImage){
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/uploads/add_photo_id", ['file' => $encodedImage]);
      echo $response->getStatusCode();
    }

    //uploads new image for a user given a userId
    function uploadProofOfResidence($userId, $encodedImage){
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/uploads/add_proof_of_residence", ['file' => $encodedImage]);
      echo $response->getStatusCode();
    }

    //update user with given userId with given put_data
    function updateUser($userId, $put_data){
      $response = clientCreator::getInstance()->request('PUT', "vendors/$this->vendorToken/users/$userId", ['json' => $put_data]);
    }

    //get details of a credit given a creditId
    function getCredits($creditId, $get_data){
      $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/credits/$creditId", ['json' => $get_data]);
      return $response->getBody();
    }

    //get credit transaction of a given data
    function getCreditTransactions($get_data){
      $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/credits", ['json' => $get_data]);
      return $response->getBody();
    }

    //updates password of a user given the old password, new password, and new password confirmation
    //new password and new password confirmation must match
    function updateUserPassword($userId, $put_data){
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId/update_password", $put_data);
    }

    //add user to this vendor
    function addUser($post_data){
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users", ['json' => $post_data]);
    }

    function deleteUser($userId){
      $response = clientCreator::getInstance()->request('DELETE',"vendors/$this->vendorToken/users/$userId");
      echo $response->getStatusCode();
    }
	}//close Vendor class

//close main php
?>
