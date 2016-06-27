<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';
  require 'users.php';
  require 'vendors.php';
  require 'vendorRemittances.php';
  require 'vendorRecipients.php';

  $newVendor = new Vendors('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor
  $newRemittance = new VendorRemittances(1);
  $newUser = new Users ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user


  // echo $newRemittance->showRemittances($newVendor->vendorToken, 43737);

  $data = array(
    'recipient_id'=> '43737',
    'remittance'=> array(
      'amount'=>'5000.00',
      'currency'=>'PHP',
      'strategy'=>'bank',
      'callback_url'=>'',
      'remittance_details'=> array(
        'bank'=>'ABC',
        'bank_account_type'=>'PHP Savings',
        'bank_account_name'=>'JC Carlo Quintos',
        'bank_account_number'=>'2013-29963',
        'delivery'=>'LBCPP',
        'pickup'=>'CLH'
      )
    )
  );

  echo $newRemittance->saveRemittance($newVendor->vendorToken, 10876, $data)."\n";
  // $newRecipient = new VendorRecipients(43737);
  // echo $newRemittance->showRemittanceInfo($newVendor->vendorToken, 43737, 56193);
  // echo $newRecipient->getRecipientDetail($newVendor->vendorToken, 10876, 43737);
  // echo $newVendor->getVendor();
  // $newVendor->getCreditTransactions();
  //$newVendor->showOutgoingRemittances(12672);
  // $newVendor->getUser(10876);
  // $newVendor->updateUser(12672, $dataRemit);
  // $newVendor->deleteUser(12677);
  // echo $newVendor->getUser(12677);
  // echo $newVendor->getVendor();
  // $newUser = new Users ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  // echo $newUser->getUser();
  // $file = '/home/hoommaah/Desktop/rebitClient/upload.jpg';
  //header('Content-Type: image/jpeg');
  //header('Content-Length: ' . filesize($file));
  // echo file_get_contents($file);
?>
