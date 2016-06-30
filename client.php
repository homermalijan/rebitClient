<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  // require 'vendor/autoload.php';
  // require 'Recipient.php';
  // require 'User.php';
  require 'Vendor.php';

  // $remit = new Remittance(1);
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
    'user'=>array(
      'first_name'=>'Carlo',
      'last_name'=>'Quintos',
      'email'=>'jcarlo.quintos@.com',
      'mobile'=>'',
      'address'=>'',
      'city'=>'',
      'contry'=>'',
      'postal_code'=>'',
      'identification'=>array(
        'url'=>'',
        'proof_of_address'=>array(
          'url'=>'',
        )
      ),
      'birthday'=>''
    )
  );
  echo $newVendor->saveUser($data);
  // echo $newVendor->update($data);

  // echo $nre->save(10876, $put_data)->getStatusCode();

?>
