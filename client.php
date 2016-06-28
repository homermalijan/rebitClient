<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';
  require 'User.php';
  require 'Vendor.php';
  require 'Remittance.php';
  require 'Recipient.php';

  $remit = new Remittance(1);
  $recip = new Recipient(1);
  $newUser = new User ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newVendor->showDetails();
  echo $remit->showAll($newVendor->vendorToken, 10876);
  echo $remit->showInfo($newVendor->vendorToken, 10876, 54050);

  // echo $newVendor->showAll();
  // echo $nr->showRemittances($newVendor->vendorToken, 10876);
  // echo $nr->deleteRemittance($newVendor->vendorToken, 10876, 48792);
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
