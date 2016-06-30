<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  // require 'vendor/autoload.php';
  // require 'Recipient.php';
  // require 'User.php';
  require 'Vendor.php';
  require 'Remittance.php';

  $remit = new Remittance('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  // $recip = new Recipient(1);
  // $newUser = new User ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newVendor->showDetails();
  // echo $newVendor->showDetails()->getBody();
  // echo $newUser->show()->getBody();
  // echo $newVendor->showDetails();
  // echo $newVendor->showOne(10876);
  // echo $nr->showRemittances($newVendor->vendorToken, 10876);

  $data = array(
    'amount' => '50',
    'currency' => 'JPY',
    'strategy' => 'pickup',
    'provider' => 'ABC',
    'province' => 'Abra'
  );

  // echo $newVendor->saveUser($data);
  // echo $newVendor->update($data);
  // echo $remit->save(10876, $data);
  echo $remit->compute(10876, $data);
  // echo $remit->showAll(10876);
  // echo $nre->save(10876, $put_data)->getStatusCode();

?>
