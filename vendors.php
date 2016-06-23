<?php
  use GuzzleHttp\Client;
  use GuzzleHttp\Exception\RequestException;

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
      // echo $response->getBody();
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
      echo json_encode(json_decode($response->getBody(), true)['user'])."\n";
      // $body = json_decode($response->getBody(), true);
      // $data = json_encode($body['user']);
      // echo $data;
    }

    function showCreditTransactions() {
    try {
       $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/credits");
      throw new Exception($response->getResponse()->getBody());
    }
    }
    function showCredit($creditId) {
      try {
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/credits/$creditId");
      } catch (GuzzleHttp\Exception\ServerException $exception) {
        echo json_decode($exception->getResponse()->getBody(), true)['error']."\n";
        // echo "Internal Server Error";
        return null;
      }
    }

    function makeCredit($param) {
      $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/credits", ['json' => $param]);

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
  // $newVendor->getUserByEmail("jomel150@yahoo.com");
  $newVendor->showCreditTransactions();
  // $newVendor->showCredit(50);

    // $put_data = array(
    //   'id'=> 1,
    //   'vendor_id'=> 10876,
    //   'invoice_address'=> "",
    //   'refreshed_at'=> "2016-05-03T10:11:18.554+08:00",
    //   'effective_rate'=> 20355.0018,
    //   'credits'=> [
    //     0
    //   ]
    // );
    //
    // $newVendor->makeCredit($put_data);
    // $newVendor->showCredit(1);





//=========================================================================================================================


//close main php
?>
