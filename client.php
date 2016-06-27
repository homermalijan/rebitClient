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

  $newVendor->getOutgoingRemittances(12636);
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
  // $newRemittance->saveRemittance($newVendor->vendorToken, 10876, $data);
  // $newVendor->getVendor();
  // $newVendor->getCreditTransactions();
  //$newVendor->showOutgoingRemittances(12672);
  // $newVendor->getUsers();
  // $newVendor->updateUser(12672, $dataRemit);
  // $newVendor->deleteUser(12677);
  // echo $newVendor->getUser(12677);

  $post_data = array(
    'recipient' => array(
      'first_name' => 'Homer',
      'last_name' => 'Homer',
      'mobile' => '09061571969',
      'email' => 'homerhomerhomer@gmail.com',
      'address' => '189 makiling st.',
      'city' => 'Calamba',
      'province' => 'Laguna',
      'postal_code' => '4027'
    )
  );
  $nr = new VendorRecipients(1);

  // $newVendor->


  // $pw_data = array(
  //   'old_password' => 'freshlikejc',
  //   'password' => 'haha',
  //   'password_confirmation' => 'haha'
  // );
  //
  // $newVendor->updateUserPassword(12636, $pw_data);

  // $newRemittance->calculateRemittance($newVendor->vendorToken, 10876, $post_data);
?>
