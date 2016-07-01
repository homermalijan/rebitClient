<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  // require 'clientCreator.php';

	class Vendor {
		var $vendorToken; 		//vendor id

		//constructor
		function __construct($vendorToken) {
			//initialize vendor token from parameter received
			$this->vendorToken = $vendorToken;
		}//close constructor

    function testing($data) {
      $prevFunct = debug_backtrace()[1]['function'];
      if (strcmp($prevFunct, 'saveUser') == 0){
        if (empty($data['user']))
            return "ERROR: MISSING USER HASH\n";
        if (empty($data['user']['first_name']))
            return "ERROR: MISSING FIRST NAME\n";
        if (empty($data['user']['last_name']))
            return "ERROR: MISSING LAST NAME\n";
        if (empty($data['user']['email']))
            return "ERROR: MISSING EMAIL\n";
        if (!filter_var($data['user']['email'], FILTER_VALIDATE_EMAIL))
            return "ERROR: INVALID EMAIL\n";
        if (!empty($data['user']['identification']['url']))
          if (!filter_var($data['user']['identification']['url'], FILTER_VALIDATE_URL))
            return "ERROR: INVALID IDENTIFICATION URL\n";
        if (!empty($data['user']['proof_of_address']['url']))
          if (!filter_var($data['user']['proof_of_address']['url'], FILTER_VALIDATE_URL))
            return "ERROR: INVALID PROOF OF ADDRESS URL\n";
      } else if (strcmp($prevFunct, 'update') == 0) {
        if (empty($data['vendor']))
            return "ERROR: MISSING VENDOR HASH\n";
        if (!empty($data['vendor']['url']))
          if (!filter_var($data['vendor']['url'], FILTER_VALIDATE_URL))
            return "ERROR: INVALID URL\n";
        if (!empty($data['vendor']['logo_url']))
          if (!filter_var($data['vendor']['logo_url'], FILTER_VALIDATE_URL))
            return "ERROR: INVALID LOGO URL\n";
        if (!empty($data['vendor']['email']))
          if (!filter_var($data['vendor']['email'], FILTER_VALIDATE_EMAIL))
            return "ERROR: INVALID EMAIL\n";
      } else if (strcmp($prevFunct, 'updateUser') == 0) {
        if (empty($data['user']))
          return "ERROR: MISSING USER HASH\n";
        if (!empty($data['user']['identification']['url']))
          if (!filter_var($data['user']['identification']['url'], FILTER_VALIDATE_URL))
            return "ERROR: INVALID IDENTIFICATION URL\n";
        if (!empty($data['user']['proof_of_address']['url']))
          if (!filter_var($data['user']['proof_of_address']['url'], FILTER_VALIDATE_URL))
            return "ERROR: INVALID PROOF OF ADDRESS URL\n";
      }
    }//close testing

    //get vendor details based on vendorToken
    function showInfo() {
      $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken");
      $response = json_decode($response->getBody(), true);
      $response = json_encode($response['vendor']);
      return $response;
    }//close getVendor

    //return specific user associated with this vendor
    function showOne($userId) {
      try{
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['user']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close showOne

    //return all users associated with this vendor
    function showAll() {
      try{
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users");
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close showAll

    //return specific user associated with this vendor via given email
    function showByEmail($userEmail) {
      $userEmail = str_replace('@', '%40', $userEmail);
      try{
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/find_by_email?email=$userEmail");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['user']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close showByEmail

    //get details of a credit given a creditId
    function showCreditInfo($creditId) {
      try{
        $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/credits/$creditId");
        $response = json_decode($response->getBody(), true);  //decodes the resposnce body
        $response = json_encode($response['credit']); // encodes back to json with out the user key
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close showCreditInfo

    //get credit transaction of a given data
    function showCreditTransactions() {
      try{
        $response = clientCreator::getInstance()->request('GET', "vendors/$this->vendorToken/credits");
        $response = json_decode($response->getBody(), true);  //decodes the resposnce body
        $response = json_encode($response['credit']); // encodes back to json with out the user key
        return $response;
      } catch (GuzzleHttp\Exception\ServerException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close showCreditTransaction

    //add user to this vendor
    function saveUser($data) {
      if(!$test = $this->testing($data)) {
        $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users", ['json' => $data]);
        return $response->getBody();
      }
      return $test;
    }//close saveUser

    function saveCredit($data) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/credits", ['json' => $data]);
      return $response->getBody();
    }
    //uploads new image for a user given a userId
    function uploadPhoto($userId, $encodedImage) {
      try{
        $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/uploads/add_photo_id", ['file' => $encodedImage]);
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close uploadPhoto

    //uploads new image for a user given a userId
    function uploadProofOfResidence($userId, $encodedImage) {
      try{
          $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/uploads/add_proof_of_residence", ['file' => $encodedImage]);
          return $response->getBody();
      } catch (GuzzleHttp\Exception\ServerException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close uploadProofOfResidence

    //update vendor attributes with given params
    function update($data) {
      if(!$test = $this->testing($data)) {
        $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken", ['json' => $data]);
        return $response->getBody();
      }
      return $test;
    }//close update

    //update user with given userId with given put_data
    function updateUser($userId, $data) {
      if(!$test = $this->testing($data)) {
        $response = clientCreator::getInstance()->request('PUT', "vendors/$this->vendorToken/users/$userId", ['json' => $data]);
        return $response->getBody();
      }
      return $test;
    }//close updateUser

    //updates password of a user given the old password, new password, and new password confirmation
    //new password and new password confirmation must match
    function updateUserPassword($userId, $data) {
      try{
        $response = clientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId/update_password", ['json' => $data]);
        return $response->getBody();
      } catch (GuzzleHttp\Exception\ServerException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close updateUserPassword

    //deletes user with userId
    function destroyUser($userId) {
      try{
        $response = clientCreator::getInstance()->request('DELETE',"vendors/$this->vendorToken/users/$userId");
        return $response->getBody();
      } catch (GuzzleHttp\Exception\ServerException $e) {
        $error = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $error;
      }
    }//close destroyUser

	}//close Vendor class
?>
