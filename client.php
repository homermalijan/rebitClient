<?php
  use GuzzleHttp\Client;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';
  require 'clientCreator.php';
  require 'users.php';
  require 'vendors.php';
  require 'vendorRemittances.php';
  require 'vendorRecipients.php';

  $newVendor = new Vendors('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X'); //new vendor
  $newRemittance = new VendorRemittances(1);
  $newUser = new Users ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user


  // $newRemittance->showRemittanceInfo($newVendor->vendorToken, 10876, 56168)
  // $newRemittance->showRemittanceso($newVendor->vendorToken, )

  $data = array(
    'recipient_id'=> 43737,
    'remittance'=> array(
      'amount'=>5,
      'currency'=>'BTC',
      'strategy'=>'BANK',
      'callback_url'=>'null',
      'remittance_details'=> array(
        'bank'=>'ABC',
        'bank_account_type'=>'PHP',
        'bank_account_name'=>'JC Carlo Quintos',
        'bank_account_number'=>'2013-29963',
        'delivery'=>'LBCPP',
        'pickup'=>'CLH'
      )
    )
  );
  $newRemittance->saveRemittance($newVendor->vendorToken, 10876, $data);
  // $newVendor->getVendor();
  // $newVendor->getCreditTransactions();
  //$newVendor->showOutgoingRemittances(12672);
  $newVendor->getUsers();
  // $newVendor->updateUser(12672, $dataRemit);
  // $newVendor->deleteUser(12677);
  // echo $newVendor->getUser(12677);
  $nr = new VendorRecipients(1);
  echo $nr->getRecipient($newVendor->vendorToken, 10876);
  // echo $newVendor->getVendor();
  // $newUser = new Users ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  // echo $newUser->getUser();
  // $file = '/home/hoommaah/Desktop/rebitClient/upload.jpg';
  //header('Content-Type: image/jpeg');
  //header('Content-Length: ' . filesize($file));
  // echo file_get_contents($file);

  // $newVendor->uploadProofOfResidence(12677, base64_encode('/home/hoommaah/Desktop/rebitClient/upload.jpg'));
  // $post_data = array (
  //   'user'=> array (
  //     'id'=> 1,
  //     'first_name'=> 'Juan',
  //     'last_name'=> 'dela Cruz',
  //     'email'=> 'juan@example.com',
  //     'birthday'=> null,
  //     'mobile'=> null,
  //     'wallet_address'=> null,
  //     'institutional'=> false,
  //     'address'=> null,
  //     'city'=> null,
  //     'country'=> null,
  //     'postal_code'=> null,
  //     'maximum_sends_per_day'=> 10,
  //     'mobile_confirmed'=> true,
  //     'kyc_level'=> 0,
  //     'identification'=> array (
  //       'url'=> null,
  //       'thumb'=> array (
  //         'url'=> null
  //       )
  //     ),
  //     'identification_confirmed'=> false,
  //     'proof_of_address'=> array (
  //       'url'=> null,
  //       'thumb'=> array(
  //         'url'=> null
  //       )
  //     ),
  //     'proof_of_address_confirmed'=> false,
  //     'recipient_ids'=> [
  //       1,
  //       2,
  //       3
  //     ],
  //     'remittance_ids'=> [
  //       1,
  //       2
  //     ],
  //     'total_remittances_today'=> 1000,
  //     'vendor_uploaded_identification'=> null,
  //     'vendor_uploaded_proof_of_address'=> null
  //   ),
  //   'password'=> 'yourpassword',
  //   'api_token'=> 'AAAAAAAAAA-t_-DCsC-sssss-xxxxx'
  // );

?>
