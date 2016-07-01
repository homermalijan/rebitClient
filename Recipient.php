<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'ClientCreator.php';

  class Recipient {
    var $vendorToken;

    function __construct($vendorToken) {
      $this->vendorToken = $vendorToken;
    }//close constructor

    function testing($data) {
      $provinces = array(
        'Abra', 'Agusan del Norte', 'Agusan del Sur', 'Aklan',
        'Albay', 'Angeles', 'Antique', 'Apayao', 'Aurora', 'Baguio',
        'Basilan', 'Bataan', 'Batanes', 'Batangas', 'Benguet', 'Biliran',
        'Bohol', 'Bukidnon', 'Bulacan', 'Cagayan', 'Camarines Norte',
        'Camarines Sur', 'Camiguin', 'Capiz', 'Catanduanes', 'Cavite',
        'Cebu', 'Compostela Valley', 'Cotabato', 'Dagupan', 'Davao Occidental',
        'Davao Oriental', 'Davao del Norte', 'Davao del Sur', 'Dinagat Islands',
        'Eastern Samar', 'Guimaras', 'Ifugao', 'Ilocos Norte', 'Ilocos Sur',
        'Iloilo', 'Isabela', 'Kalinga', 'La Union', 'Laguna', 'Lanao del Norte',
        'Lanao del Sur', 'Leyte', 'Lucena', 'Maguindanao', 'Marinduque',
        'Masbate', 'Metro Manila', 'Mindoro Occidental', 'Mindoro Oriental',
        'Misamis Occidental', 'Misamis Oriental', 'Mountain Province', 'Naga',
        'Negros Occidental', 'Negros Oriental', 'Northern Samar', 'Nueva Ecija',
        'Nueva Vizcaya', 'Olongapo', 'Palawan', 'Pampanga', 'Pangasinan',
        'Puerto Princesa', 'Quezon', 'Quirino', 'Rizal', 'Romblon', 'Samar',
        'Santiago', 'Sarangani', 'Siquijor', 'Sorsogon', 'South Cotabato',
        'Southern Leyte', 'Sultan Kudarat', 'Sulu', 'Surigao del Norte',
        'Surigao del Sur', 'Tarlac', 'Tawi-Tawi', 'Zambales', 'Zamboanga',
        'Zamboanga del Norte', 'Zamboanga del Sur'
      );

      $prevFunct = debug_backtrace()[1]['function'];
      if (strcmp($prevFunct, 'save') == 0){
        if (empty($data['recipient']))
          return "ERROR: MISSING RECIPIENT HASH\n";
        if (empty($data['recipient']['first_name']))
          return "ERROR: MISSING FIRST NAME\n";
        if (empty($data['recipient']['last_name']))
          return "ERROR: MISSING LAST NAME\n";
        if (empty($data['recipient']['mobile']))
          return "ERROR: MISSING MOBILE\n";
        if (!empty($data['recipient']['email']))
          if (!filter_var($data['recipient']['email'], FILTER_VALIDATE_EMAIL))
            return "ERROR: INVALID EMAIL\n";
        if (!empty($data['recipient']['province']))
          if (!in_array($data['recipient']['province'], $provinces))
            return "ERROR: INVALID PHILIPPINE PROVINCE\n";
      } else if (strcmp($prevFunct, 'update') == 0) {
        if (empty($data['recipient']))
          return "ERROR: MISSING RECIPIENT HASH\n";
        // if (empty($data['recipient']['first_name']))
        //   return "ERROR: MISSING FIRST NAME\n";
        // if (empty($data['recipient']['last_name']))
        //   return "ERROR: MISSING LAST NAME\n";
        // if (empty($data['recipient']['mobile']))
        //   return "ERROR: MISSING MOBILE\n";
        if (!empty($data['recipient']['email']))
          if (!filter_var($data['recipient']['email'], FILTER_VALIDATE_EMAIL))
            return "ERROR: INVALID EMAIL\n";
        if (!empty($data['recipient']['province']))
          if (!in_array($data['recipient']['province'], $provinces))
            return "ERROR: INVALID PHILIPPINE PROVINCE\n";
      }//close main else if
    }//close function testing

    //get details of a recipient user from a vendor
    function showInfo($userId, $recipientId) {
      try{
        $response = ClientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/recipients/$recipientId");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['recipient']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close showInfo

    //get list of recipients from a vendor
    function showAll($userId) {
      try{
        $response = ClientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/recipients");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close show

    //create a new recipient from a user to a new vendor
    function save($userId, $data) {
      try{
        if(!$test = $this->testing($data)) {
          $response = ClientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/recipients", ['json' => $data]);
          return $response->getBody();
        }
        return $test;
      } catch (GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close save

    //update datails of a recipient from put_data via recipient_id of auser belonging to a vendor
    function update($userId, $recipientId, $data) {
      try{
        if(!$test = $this->testing($data)) {
          $response = ClientCreator::getInstance()->request('PUT',"vendors/$this->vendorToken/users/$userId/recipients/$recipientId", ['json' => $data]);
          return $response->getBody();
        }
        return $test;
      } catch (GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close update

    //*ISSUE: not yet tested*
    // delete a recipient from put_data via recipient_id of auser belonging to a vendor
    function destroy($userId, $recipientId) {
      try{
        $response = ClientCreator::getInstance()->request('DELETE',"vendors/$this->vendorToken/users/$userId/recipients/$recipientId");
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close destroy

  }//close VendorRecipient class
?>
