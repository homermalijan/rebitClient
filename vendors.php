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

    function destroyUser($userId) {
      $response = clientCreator::getInstance()->request('DELETE',"vendors/$this->vendorToken/users/$userId");
      return $response->getBody();
    }

    //get vendor details based on vendorToken
    function showDetails() {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken");
      $response = json_decode($response->getBody(), true);
      $response = json_encode($response['vendor']);
      //return json object
      return $response;
    }//close getVendor

    //return specific user associated with this vendor
    function showOne($userId) {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId");
      $response = json_decode($response->getBody(), true);
      $response = json_encode($response['user']);
      return $response;
    }

    //return all users associated with this vendor
    function showAll() {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users");
      return $response->getBody();
    }

    //return specific user associated with this vendor via given email
    function showByEmail($userEmail) {
      $userEmail = str_replace('@', '%40', $userEmail);
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/find_by_email?email=$userEmail");
      return $response->getBody();
    }

    function showOutgoingRemittances($userId) {
      $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/users/$userId/outgoing_remittances");
      return $response->getBody();
    }

    //get details of a credit given a creditId
    function showCreditInfo($creditId, $get_data) {
      $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/credits/$creditId", ['json' => $get_data]);
      $response = json_decode($response->getBody(), true);  //decodes the resposnce body
      $response = json_encode($response['credit']); // encodes back to json with out the user key
      return $response;
    }

    //get credit transaction of a given data
    function showCreditTransactions() {
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

    //add user to this vendor
    function saveUser($post_data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users", ['json' => $post_data]);
      return $response->getBody();
    }

    //uploads new image for a user given a userId
    function uploadPhoto($userId, $encodedImage) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/uploads/add_photo_id", ['file' => $encodedImage]);
      return $response->getBody();
    }

    //uploads new image for a user given a userId
    function uploadProofOfResidence($userId, $encodedImage) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/uploads/add_proof_of_residence", ['file' => $encodedImage]);
      return $response->getBody();
    }

    //update vendor attributes with given params
    function  update($put_data) {
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken", ['json' => $put_data]);
    }

    //update user with given userId with given put_data
    function updateUser($userId, $put_data) {
      $response = clientCreator::getInstance()->request('PUT', "vendors/$this->vendorToken/users/$userId", ['json' => $put_data]);
      return $response->getBody();
    }

    //updates password of a user given the old password, new password, and new password confirmation
    //new password and new password confirmation must match
    function updateUserPassword($userId, $put_data) {
      $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId/update_password", $put_data);
      return $response->getBody();
    }
	}//close Vendor class

//close main php
?>
