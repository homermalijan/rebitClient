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


  // $newRemittance->showRemittanceInfo($newVendor->vendorToken, 10876, 56168)
  // $newRemittance->showRemittanceso($newVendor->vendorToken, )

  $data = array(
    'recipient_id'=> 43737,
    'remittance'=> array(
      'amount'=>5,
      'currency'=>'BTC',
      'strategy'=>'BANK',
      'callback_url'=>'null',
      'remittance_details'=> array(
        'bank'=>'ABC',
        'bank_account_type'=>'PHP',
        'bank_account_name'=>'JC Carlo Quintos',
        'bank_account_number'=>'2013-29963',
        'delivery'=>'LBCPP',
        'pickup'=>'CLH'
      )
    )
  );
  $newRemittance->saveRemittance($newVendor->vendorToken, 10876, $data);
  // $newVendor->getVendor();
  // $newVendor->getCreditTransactions();
  //$newVendor->showOutgoingRemittances(12672);
  $newVendor->getUsers();
  // $newVendor->updateUser(12672, $dataRemit);
?>
