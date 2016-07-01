<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  // require 'User.php';
  // require 'Vendor.php';
  require 'Recipient.php';
  // require 'Remittance.php';

  // $newUser = new User ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  // $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor
  $recip = new Recipient('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  // $remit = new Remittance('xZo4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');

  // echo $newUser->show();
  // echo $newVendor->showInfo();
  // echo $newVendor->showOne(10874);
  // echo $newVendor->showAll();
  // echo $newVendor->showByEmail("jomel150@yahoo.com");
  // echo $newVendor->showCreditInfo();                                         --> x
  // echo $newVendor->showCreditTransactions();                                 --> x
  // echo $newVendor->destroyUser(12710);
  // echo $newVendor->saveUser($data);
  // echo $newVendor->saveCredit($data);                                        --> x
  // echo $newVendor->update($data);
  // echo $newVendor->updateUser(10876, $data);
  // echo $newVendor->updateUserPassword(12636, $data);                         --> x

  // echo $remit->showInfo(10876, 53857);
  // echo $remit->showAll(1087);
  // echo $remit->save(10876, $data);
  // echo $remit->compute(10876, $data);
  // echo $remit->destroy(10876, 51486);

  // echo $recip->showAll(876);
  // echo $recip->showInfo(10876, 48521);

  $data = array(
    'recipient'=>array(
      'first_name'=>'JC Carlo',
      'last_name'=>'Quintos',
      'mobile'=>'09179206xxx',
      'email'=>'jdquintos@up.edu.ph',
      'address'=>'',
      'city'=>'',
      'province'=>'',
      'postal_code'=>'',
    )
  );
  echo $recip->save(1076, $data);
  // echo $recip->update(10876, 49247, $data);
  // echo $recip->destroy(10876, 49247);                                        --> x
?>
