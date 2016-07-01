<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  // require 'Recipient.php';
  // require 'User.php';
  require 'Vendor.php';
  // require 'Remittance.php';

  // $remit = new Remittance('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  // $recip = new Recipient('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
  // $newUser = new User ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $newVendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor

  // echo $newUser->show();
  // echo $newVendor->showInfo();
  // echo $newVendor->showOne(10874);
  // echo $newVendor->showAll();
  // echo $newVendor->showByEmail("jomel150@yahoo.com");
  // echo $newVendor->showCreditInfo();                                         --> x
  // echo $newVendor->showCreditTransactions();                                 --> x
  // echo $newVendor->destroyUser(12710);
  $data = array(
    'user'=>array(
      'first_name'=>'JC Carlo',
      'last_name'=>'Quintos',
      'email'=>'jdquintos@up.edu.ph',
      'mobile'=>'09179206xxx',
      'address'=>'',
      'city'=>'',
      'contry'=>'',
      'postal_code'=>'',
      'identification'=>array(
        'url'=>'https://www.facebook.com/jccarlo.quintos',
      ),
      'proof_of_address'=>array(
        'url'=>'https://www.facebook.com/photo.php?fbid=1028586340506986&set=a.149785785053717.30230.100000668905586&type=3&theater',
        )
      ),
      'birthday'=>'1/28/1997'
  );
  echo $newVendor->saveUser($data);
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
