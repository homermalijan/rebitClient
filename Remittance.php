<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';

  class Remittance {
    var $vendorToken;

    function __construct($vendorToken) {
      $this->vendorToken = $vendorToken;
    }//close constructor

    function testing($data) {
      $prevFunct = debug_backtrace()[1]['function'];
      if (strcmp($prevFunct, 'save') == 0){
        if (empty($data['recipient_id']))
            return ('ERROR: MISSING RECIPIENT ID')."\n";
        else if (empty($data['remittance']['amount']))
            return ('ERROR: MISSING AMOUNT')."\n";
        else if (empty($data['remittance']['currency']))
            return ('ERROR: MISSING CURRENCY')."\n";
        else if (empty($data['remittance']['strategy']))
            return ('ERROR: MISSING STRATEGY')."\n";
      } else if (strcmp($prevFunct, 'compute') == 0) {
        if (empty($data['amount']))
            return ('ERROR: MISSING AMOUNT')."\n";
        else if (empty($data['currenct']))
            return ('ERROR: MISSING CURRENCY')."\n";
        else if (empty($data['strategy']))
            return ('ERROR: MISSING STRATEGY')."\n";
        else if (empty($data['provider']))
            return ('ERROR: MISSING PROVIDER')."\n";
        else if (empty($data['province']))
            return ('ERROR: MISSING PROVINCE')."\n";
      }//close main else if
    }//close testing

    //shows info of a remittance for a user associated to a vendor
    function showInfo($userId, $remittanceId) {
      try {
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/remittances/$remittanceId");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['recipient']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close showInfo

    //show all remittances associated to a user
    function showAll($userId) {
      try {
        $response = clientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/remittances");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['remittance_ids']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close showAll

    //creates a remmitance for a user associated to a vendor
    function save($userId, $data) {
      try{
        $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/remittances", ['json' => $data]);
        // $response = json_decode($response->getBody(), true);
        // $response = json_encode($response['remittance']);
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
        // $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $e->getResponse()->getBody();
      }
    }//close save

    //compute remmitance of for a user given a set of data
    function compute($userId, $post_data){
      try{
        $response = clientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/remittances/calculate", ['json' => $post_data]);
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['response']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
        return $errMessage;
      }
    }//close compute

    //deletes a remittance given a vendor token, user id, and remittance id
    // function destroy($userId, $remittanceId) {
    //   try {
    //     $response = clientCreator::getInstance()->request('DELETE',"vendors/$this->vendorToken/users/$userId/remittances/$remittanceId");
    //     return $response->getBody();
    //   } catch(GuzzleHttp\Exception\ClientException $e) {
    //     $errMessage = json_decode($e->getResponse()->getBody(), true)['error']."\n";
    //     return $errMessage;
    //   }
    // }//close destroy

  }//close class remittances
?>
