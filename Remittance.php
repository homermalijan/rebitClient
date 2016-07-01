<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'ClientCreator.php';

  class Remittance {
    var $vendorToken;

    function __construct($vendorToken) {
      $this->vendorToken = $vendorToken;
    }//close constructor

    //test the parameters for post and put requests
    function testing($data) {
      //gets the name of function that called this test
      $prevFunct = debug_backtrace()[1]['function'];
      $currencies = array(
        'PHP', 'USD', 'CAD', 'JPY', 'AUD', 'SGD', 'HKD', 'KRW',
        'CNY', 'EUR', 'VND', 'SAR', 'TWD', 'QAR', 'KWD', 'AED',
        'GBP', 'MYR', 'INR', 'IDR', 'LKR', 'BTC'
      );
      $strategies = array(
        'pickup', 'bank', 'bills', 'eload'
      );
      $banks = array(
        'ABC', 'ASB', 'AUB', 'BDO', 'BPI', 'BPI', 'BOA', 'BOC',
        'CBS', 'CBC', 'CCB', 'CTS', 'CIT', 'CIS', 'EWB', 'EWR',
        'EQC', 'HBP', 'HSB', 'LBP', 'MSB', 'MAY', 'MET', 'PBC',
        'PNB', 'PSB', 'PAC', 'PVB', 'PTC', 'PPB', 'RCB', 'RSB',
        'RBN', 'SBS', 'SEC', 'SCB', 'SBA', 'TYB', 'USB', 'UCP',
        'UBP'
      );
      $bank_acc_type = array(
        'PHP Savings', 'PHP Checking'
      );
      $pick_up_providers = array(
         'CLH', 'MLH', 'PAL', 'TAM', 'LBC', 'MGP', 'CEL', 'CMG',
         'VIA', 'OKR', 'CNT', 'PRR', 'RDP', 'HQ'
      );
      $remit_provider_slugs = array(
        'ABC', 'ASB', 'AUB', 'BDO', 'BPI', 'BPI', 'BOA', 'BOC',
        'CBS', 'CBC', 'CCB', 'CTS', 'CIT', 'CIS', 'EWB', 'EWR',
        'EQC', 'HBP', 'HSB', 'LBP', 'MSB', 'MAY', 'MET', 'PBC',
        'PNB', 'PSB', 'PAC', 'PVB', 'PTC', 'PPB', 'RCB', 'RSB',
        'RBN', 'SBS', 'SEC', 'SCB', 'SBA', 'TYB', 'USB', 'UCP',
        'UBP', 'CLH', 'MLH', 'PAL', 'TAM', 'LBC', 'MGP', 'CEL',
        'CMG', 'VIA', 'OKR', 'CNT', 'PRR', 'RDP', 'HQ', 'LBCPP'
      );
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
      //this test is for the parameters of save function
      if (strcmp($prevFunct, 'save') == 0) {
        //checks the the validity of required parameters
        if (empty($data['recipient_id']))
            return "ERROR: MISSING RECIPIENT ID\n";
        if (empty($data['remittance']))
            return "ERROR: MISSING REMITTANCE HASH\n";
        if (empty($data['remittance']['amount']))
            return "ERROR: MISSING AMOUNT\n";
        if (empty($data['remittance']['currency']))
            return "ERROR: MISSING CURRENCY CODE\n";
        if (!in_array($data['remittance']['currency'], $currencies))
            return "ERROR: INVALID CURRENCY CODE\n";
        if (empty($data['remittance']['strategy']))
            return "ERROR: MISSING STRATEGY\n";
        if (!in_array($data['remittance']['strategy'], $strategies))
            return "ERROR: INVALID STRATEGY\n";
        //checks if it is a valid url
        if (!empty($data['remittance']['callback_url'])) {
            $callback_url = $data['remittance']['callback_url'];
            if (!filter_var($callback_url, FILTER_VALIDATE_URL))
              return "ERROR: INVALID CALLBACK URL\n";
        }
        if (empty($data['remittance']['remittance_details']))
            return "ERROR: MISSING REMITTANCE DETAILS\n";
        //variable is used for brevity
        $remit_details = $data['remittance']['remittance_details'];
        //if bank is the strategy of the remittance
        if (strcmp($data['remittance']['strategy'], 'bank') == 0) {
            //checks other fields not required to the strategy bank
            if(!empty($remit_details['pickup']) ||
               !empty($remit_details['pickup'])) {
                 return "ERROR: FIELD UNMATCHED FOR STRATEGY\n";
            }
            if(empty($remit_details['bank']))
              return "ERROR: MISSING BANK NAME\n";
            if(!in_array($remit_details['bank'], $banks))
              return "ERROR: INVALID BANK NAME\n";
            if(empty($remit_details['bank_account_type']))
              return "ERROR: MISSING BANK ACCOUNT TYPE\n";
            if(!in_array($remit_details['bank_account_type'], $bank_acc_type))
              return "ERROR: INVALID BANK ACCOUNT TYPE\n";
            if(empty($remit_details['bank_account_name']))
              return "ERROR: MISSING BANK ACCOUNT NAME\n";
            if(empty($remit_details['bank_account_number']))
              return "ERROR: MISSING BANK ACCOUNT NUMBER\n";
        }
        //if delivery is the strategy of the remittance
        if (strcmp($data['remittance']['strategy'], 'delivery') == 0) {
            //checks other fields not required to the strategy delivery
            if(!empty($remit_details['bank']) ||
               !empty($remit_details['bank_account_type']) ||
               !empty($remit_details['bank_account_name']) ||
               !empty($remit_details['bank_account_number']) ||
               !empty($remit_details['pickup'])) {
                 return "ERROR: FIELD UNMATCHED FOR STRATEGY\n";
            }
            if(empty($remit_details['delivery']))
              return "ERROR: MISSING DELIVERY PROVIDER NAME\n";
            if(strcmp($remit_details['delivery'], 'LBCPP') == 0)
              return "ERROR: INVALID DELIVERY PROVIDER NAME\n";
        }
        //if pickup is the strategy of the remittance
        if (strcmp($data['remittance']['strategy'], 'pickup') == 0) {
            //checks other fields not required for the strategy pickup
            if(!empty($remit_details['bank']) ||
               !empty($remit_details['bank_account_type']) ||
               !empty($remit_details['bank_account_name']) ||
               !empty($remit_details['bank_account_number']) ||
               !empty($remit_details['delivery'])) {
                 return "ERROR: FIELD UNMATCHED FOR STRATEGY\n";
            }
            if(empty($remit_details['pickup']))
              return "ERROR: MISSING PICKUP PROVIDER NAME\n";
            if(!in_array($remit_details['pickup'], $pick_up_providers))
              return "ERROR: INVALID PICKUP PROVIDER NAME\n";
        }
        //test for the params of compute remittance
      } else if (strcmp($prevFunct, 'compute') == 0) {
        //checks the validity of each parameter
        if (empty($data['amount']))
            return "ERROR: MISSING AMOUNT\n";
        if (!ctype_digit($data['amount']))
            return "ERROR: AMOUNT IS NOT A NUMBER\n";
        if (empty($data['currency']))
            return "ERROR: MISSING CURRENCY CODE\n";
        if (!in_array($data['currency'], $currencies))
            return "ERROR: INVALID CURRENCY CODE\n";
        if (empty($data['strategy']))
            return "ERROR: MISSING STRATEGY\n";
        if (!in_array($data['strategy'], $strategies))
            return "ERROR: INVALID STRATEGY\n";
        if (empty($data['provider']))
            return "ERROR: MISSING REMITTANCE PROVIDER SLUG\n";
        if (!in_array($data['provider'], $remit_provider_slugs))
            return "ERROR: INVALID REMITTANCE PROVIDER SLUG\n";
        if (empty($data['province']))
            return "ERROR: MISSING PROVINCE\n";
        if (!in_array($data['province'], $provinces))
            return "ERROR: INVALID PHILIPPINE PROVINCE\n";
      }//close main else if
    }//close testing

    //shows info of a remittance for a user associated to a vendor
    function showInfo($userId, $remittanceId) {
      try {
        $response = ClientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/remittances/$remittanceId");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['recipient']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close showInfo

    //show all remittances associated to a user
    function showAll($userId) {
      try {
        $response = ClientCreator::getInstance()->request('GET',"vendors/$this->vendorToken/users/$userId/remittances");
        $response = json_decode($response->getBody(), true);
        $response = json_encode($response['remittance_ids']);
        return $response;
      } catch(GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close showAll

    //creates a remmitance for a user associated to a vendor
    function save($userId, $data) {
      try{
        if (!$test = $this->testing($data))  {
          $response = ClientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/remittances", ['json' => $data]);
          return $response->getBody();
        }
        return $test;
      } catch (GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close save

    //compute remmitance of for a user given a set of data
    function compute($userId, $data) {
      try{
        if (!$test = $this->testing($data)) {
          $response = ClientCreator::getInstance()->request('POST',"vendors/$this->vendorToken/users/$userId/remittances/calculate", ['json' => $data]);
          return $response->getBody();
        }
        return $test;
      } catch (GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close compute

    // deletes a remittance given a vendor token, user id, and remittance id
    function destroy($userId, $remittanceId) {
      try {
        $response = ClientCreator::getInstance()->request('DELETE',"vendors/$this->vendorToken/users/$userId/remittances/$remittanceId");
        return $response->getBody();
      } catch(GuzzleHttp\Exception\ClientException $e) {
        return "SERVER ERROR.\n";
      }
    }//close destroy

  }//close class remittances
?>
