<?php
  require('Vendor.php');

  class VendorTest extends PHPUnit_Framework_TestCase{
    private $vendor;

    protected function setUp(){
      $this->vendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
    }

    protected function tearDown(){
      $this->vendor = NULL;
    }

    public function testShowDetails() {
      $result = $this->vendor->showDetails();
      $this->assertEquals(200, $result->getStatusCode());
    }

    public function testShowOne() {
      $result = $this->vendor->showOne(10876);
      $this->assertEquals(200, $result->getStatusCode());
    }

    public function testShowAll() {
      $result = $this->vendor->showAll();
      $this->assertEquals(200, $result->getStatusCode());
    }

    // public function testShowByEmail() {
    //   $result = $this->vendor->showByEmail(10876);
    //   $this->assertEquals(200, $result->getStatusCode());
    // }

    // public function testShowCreditInfo() {
    //   $result = $this->vendor->showCreditInfo();
    //   $this->asserEquals(200, $result->getStatusCode());
    // }

    // public function testShowCreditTransaction() {
    //   $result = $this->vendor->showCreditTransactions();
    //   $this->assertEquals(200, $result->getStatusCode());
    // }

    public function testSaveUser() {
      $data = array(
      	'user'=>array(
          'first_name'=>'Carlo',
          'last_name'=>'Quintos',
      		'email'=>'',
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

      $result = $this->vendor->saveUser($data);
      $this->assertEquals(200, $result->getStatusCode());
    }

    // public function testUploadPhoto(){
    //   $result = $this->vendor->uploadPhoto(10876, );
    //   $this->assertEquals(200, $result->getStatusCode());
    // }
    //
    // public function testUploadProofOfResidence(){
    //   $result = $this->vendor->uploadProofOfResidence(10876, );
    //   $this->assertEquals(200, $result->getStatusCode());
    // }

    public function testUpdate(){
      $data = array(
        'vendor'=> array(
          'id'=> 1,
          'name'=> 'Bit',
          'url'=> 'http=>//www.example.com',
          'logo_url'=> 'http=>//www.example.com/logo.jpg',
          'phone'=> '90000000',
          'email'=> 'hello@example.com',
          'active'=> true,
          'user_ids'=> [
            1,
            2,
            3
          ]
        ),
      );
      $result = $this->vendor->update($data);
      $this->assertEquals(200, $result->getStatusCode());
    }

    public function testUpdateUser(){
      $data = array(
        'user'=>array(
          'first_name'=>'Carlo',
          'last_name'=>'Quintos',
          'email'=>'jcarlo.quintos@gmail.com',
          'mobile'=>'09179206511',
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
      $result = $this->vendor->updateUser(10876, $data);
      $this->assertEquals(200, $result->getStatusCode());
    }

    public function destroyUser() {
      $result = $this->vendor->destroyUser(12711);
      $this->assertEquals(200, $result->getStatusCode());
    }




  }//close RemittanceTest class
?>
