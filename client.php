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

  // echo $newVendor->getUsers();

  $newUser = new Users ('wUVEoYSSpzzg85pHK-dLkHMGw7tkhEmd');    //new user
  $post_data = array(
    'user' => array(
      'id'=>12639,
      'first_name'=>'JC Carlo',
      'last_name'=>'Quintos',
      'email'=>'jcarlo.quintos2@gmail.com',
      'birthday'=>null,
      'mobile'=>'+639179206511',
      'wallet_address'=>null,
      'institutional'=>false,
      'address'=>'189 Mt Makiling St., Brgy. Palingon',
      'city'=>'Calamba City',
      'country'=>null,
      'postal_code'=>null,
      'maximum_sends_per_day'=>10,
      'mobile_confirmed'=>false,
      'kyc_level'=>0,
      'identification'=> array(
        'url'=>'https=>//scirebit1.s3.amazonaws.com/uploads/user/identification/12636/b274cb50-6deb-4365-96cf-21553d7986c3.jpg',
        'thumb'=> array(
          'url'=>'https=>//scirebit1.s3.amazonaws.com/uploads/user/identification/12636/thumb_b274cb50-6deb-4365-96cf-21553d7986c3.jpg'
          )
        ),
        'identification_confirmed'=>false,
        'proof_of_address'=> array(
          'url'=>null,'thumb'=> array(
            'url'=>null
          )
        ),
        'proof_of_address_confirmed'=>false,
        'recipient_ids'=>[],
        'remittance_ids'=>[],
        'total_remittances_today'=>0,
        'vendor_uploaded_identification'=>null,
        'vendor_uploaded_proof_of_address'=>null
      )
  );

  $put_data = array(
    'user'=> array(
      'old_password'=>           'freshlikejc',
      'password'=>               'notsofreshlikejc',
      'password_confirmation'=>  'notsofreshlikejc'
    )
  );

  $get_data = array(
    'id'=> 1,
    'vendor_id'=> 1,
    'invoice_address'=> 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx',
    'refreshed_at'=> '2016-05-03T10=>11=>18.554+08=>00',
    'effective_rate'=> 20355.0018,
    'credits'=> [
      0
    ]
  );
?>
