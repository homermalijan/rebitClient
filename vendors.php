<?php
  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Request;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';													

	
	class Vendors{
		var $vendorToken; 		//vendor id
		var $vendors;     		//vendor client
									
		//constructor							
		function __construct($vendorToken){
			//initialize vendor token from parameter received
			$this->vendorToken = $vendorToken;
		}//close constructor

		//get vendor details based on vendorToken
		function getVendor(){	
			$response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken");
			$body = json_decode($response->getBody(), true);						
			$data = json_encode($body['vendor'])."\n";
			
			//return json object
			return $data;
		}//close getVendor
	}//close class

  $newVendor = new Vendors('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  $newVendor->getVendor();

//close main php
?>
