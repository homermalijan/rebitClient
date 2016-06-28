<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'Recipient.php';
  // require 'User.php';
  require 'Vendor.php';

  $nre = new Recipient('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  // $newUser = new User('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newVendor->showDetails();
  // echo $newVendor->showOne(10876);
  // echo $nr->showRemittances($newVendor->vendorToken, 10876);

  $put_data = array(
    'recipient' => array(
      'first_name' => 'homer',
      'last_name' => 'malijan',
      'email' => 'hcmalijan@up.edu.ph',
      'mobile' => '09061571969'
    )
  );

  // echo $nre->save(10876, $put_data)->getStatusCode();

?>
