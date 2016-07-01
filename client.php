<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'Recipient.php';
  require 'User.php';
  require 'Vendor.php';
  require 'Remittance.php';

  $remit = new Remittance('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  $recip = new Recipient('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  $newUser = new User ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newUser->show();
  // echo $newVendor->showInfo();
  // echo $newVendor->showOne(10876);
  // echo $newVendor->showAll();
  // echo $newVendor->showByEmail("jcarlo.quintos@gmail.com0");
  // echo $newVendor->showCreditInfo();                                         --> x
  // echo $newVendor->showCreditTransactions();                                 --> x
  // echo $newVendor->destroyUser(12710);
  // echo $newVendor->saveUser($data);
  // echo $newVendor->saveCredit($data);                                        --> x
  // echo $newVendor->update($data);
  // echo $newVendor->updateUser(10876, $data)
  // echo $newVendor->updateUserPassword(12636, $data);                         --> x

  // echo $remit->showAll(10876);
  // echo $remit->showInfo(10876, 53857);
  // echo $remit->save(10876, $data);
  // echo $remit->compute(10876, $data);
  // echo $remit->destroy(10876, 51486);

  // echo $recip->showAll(10876);
  // echo $recip->showInfo(10876, 48521);
  // echo $recip->save(10876, $data);
  // echo $recip->update(10876, 49247, $data);
  // echo $recip->destroy(10876, 49247);                                        --> x
?>
