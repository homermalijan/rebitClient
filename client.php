<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';
  require 'users.php';
  require 'vendors.php';
  require 'vendorRemittances.php';
  require 'vendorRecipients.php';

  $nr = new VendorRemittances(1);
  $nre = new VendorRecipients(1);
  $newUser = new Users ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendors('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newVendor->getUser(10876);
  // echo $nr->showRemittances($newVendor->vendorToken, 10876);
  echo $nr->deleteRemittance($newVendor->vendorToken, 10876, 48792);
  // echo $nre->deleteRecipient($newVendor->vendorToken, 10876,48291);

  // echo $nre->getRecipient($newVendor->vendorToken, 10876);

  // $nr->showRemittances($newVendor->vendorToken, 10876);
  // echo $nr->showRemittanceInfo($newVendor->vendorToken, 10876, 61634);
  // echo $nr->saveRemittance($newVendor->vendorToken, 10876, $data);
  // echo $nr->deleteRemittance($newVendor->vendorToken, 10876, 61634);
  // echo $nr->calculateRemittance($newVendor->vendorToken, 10876, $data);

  // echo $nre->updateRecipient($newVendor->vendorToken, 10876, 48291, $data);
  // echo $nre->getRecipientDetail($newVendor->vendorToken, 10876, 48291);

  // echo $nre->deleteRecipient($newVendor->vendorToken, 10876, 48291);
  $data = array(
    'recipient' => array(
      'first_name' => "homerhomer",
      'last_name' => "malijan",
      'mobile' => "090615171969",
      'email' => "hcmalijan@up.edu.ph",
      'address' => "951 brgy lamot 2",
      'city' => "calamba",
      'province' => 'Laguna',
      'postal_code' => '4012'
    )
    //48291 recipient id
  );
?>
