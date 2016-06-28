<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'Recipient.php';
  // require 'User.php';
  require 'Vendor.php';

<<<<<<< HEAD
  $remit = new Remittance(1);
  $recip = new Recipient(1);
  $newUser = new User ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newVendor->showDetails();
  echo $remit->showAll($newVendor->vendorToken, 10876);
  echo $remit->showInfo($newVendor->vendorToken, 10876, 54050);

  // echo $newVendor->showAll();
=======
  $nre = new Recipient('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  // $newUser = new User('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newVendor->showDetails();
  // echo $newVendor->showOne(10876);
>>>>>>> ae8293d61d22998d577b499715fb5868c77086f1
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
