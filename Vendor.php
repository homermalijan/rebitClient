<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';

	class Vendor {
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
      $response = json_decode($response->getBody(), true);
      $response = json_encode($response['user']);
      return $response;
    }

    //return specific user associated with this vendor via given email
    function getUserByEmail($userEmail) {
      $userEmail = str_replace('@', '%40', $userEmail);
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/find_by_email?email=$userEmail");
      return $response->getBody();
    }

    //uploads new image for a user given a userId
    function uploadPhoto($userId, $encodedImage) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/uploads/add_photo_id", ['file' => $encodedImage]);
      echo $response->getStatusCode();
    }

    //uploads new image for a user given a userId
    function uploadProofOfResidence($userId, $encodedImage) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/uploads/add_proof_of_residence", ['file' => $encodedImage]);
      echo $response->getStatusCode();
    }

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
      try{
        $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/credits");
        $response = json_decode($response->getBody(), true);  //decodes the resposnce body
        $response = json_encode($response['credit']); // encodes back to json with out the user key
        return $response;
      } catch (GuzzleHttp\Exception\ServerException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }

    //updates password of a user given the old password, new password, and new password confirmation
    //new password and new password confirmation must match
    function updateUserPassword($userId, $put_data) {
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId/update_password", $put_data);
      return $response->getBody();
    }

    //add user to this vendor
    function addUser($post_data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users", ['json' => $post_data]);
      return $response->getBody();
    }

    function deleteUser($userId) {
      $response = clientCreator::getInstance()->request('DELETE',"vendors/$this->vendorToken/users/$userId");
      return $response->getBody();
    }

    function getOutgoingRemittances($userId) {
      $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/users/$userId/outgoing_remittances");
      return $response->getBody();
    }

	}//close Vendor class

//close main php
?>
