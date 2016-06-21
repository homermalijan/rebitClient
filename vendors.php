<?php
  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Request;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';


  class Vendors{
    var $vendorToken; //vendor id
    var $vendors;     //vendor client

    function __construct($vendorToken){
      $this->vendorToken = $vendorToken;
    }//close constructor

    function getVendor(){               //retrieve a vendor obj given a vendor id
      $tempClient = clientCreator::getInstance();
      $response = $tempClient->request('GET',"vendors/$this.{vendorToken}");
      $body = $response->getBody();

      echo $body."\n";
      echo $response->getStatusCode()."\n"; // 200
      echo $response->getReasonPhrase()."\n"; // OK
      echo $response->getProtocolVersion()."\n"; // 1.1
    }//close getVendor
  }//close class

  $newVendor = new Vendors('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  $newVendor->getVendor();








  //$NewVendors = new vendorToken('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');


?>
