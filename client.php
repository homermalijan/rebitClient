<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
<<<<<<< HEAD
  require 'Recipient.php';
  // require 'User.php';
  require 'Vendor.php';

  $nre = new Recipient('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  // $newUser = new User('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  // $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newVendor->showDetails();
  // echo $newVendor->showOne(10876);
  // echo $nr->showRemittances($newVendor->vendorToken, 10876);

  $put_data = array(
=======
  require 'clientCreator.php';
  require 'User.php';
  require 'Vendor.php';
  require 'Remittance.php';
  require 'Recipient.php';

  $nr = new Remittance(1);
  $nre = new Recipient(1);
  $newUser = new User ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  echo $newVendor->showDetails();

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
>>>>>>> d7b76c04e0491cbe479a60b15cf25674776915f3
    'recipient' => array(
      'first_name' => 'homer',
      'last_name' => 'malijan',
      'email' => 'hcmalijan@up.edu.ph',
      'mobile' => '09061571969'
    )
  );

  // echo $nre->save(10876, $put_data)->getStatusCode();

?>
