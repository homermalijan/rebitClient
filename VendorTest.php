<?php
  require 'Vendor.php';

  class VendorTest extends PHPUnit_Framework_TestCase{
    private $vendor;

    protected function setUp(){
      $this->vendor = new Vendor('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
    }

    protected function tearDown(){
      $this->vendor = NULL;
    }

    public function testShowInfo() {
      $result = $this->vendor->showInfo();
      $this->assertNotNull(json_decode($result));
      // $this->assertEquals(200, $result->getStatusCode());
    }

    public function testShowOne() {
      $result = $this->vendor->showOne(10876);
      $this->assertNotNull(json_decode($result));
      // $this->assertEquals(200, $result->getStatusCode());
    }

    public function testShowAll() {
      $result = $this->vendor->showAll();
      $this->assertInternalType('array', json_decode($result));
      // $this->assertEquals(200, $result->getStatusCode());
    }

    public function testShowByEmail() {
      $result = $this->vendor->showByEmail('jomel150@yahoo.com');
      $this->assertNotNull(json_decode($result));
    }

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
          'first_name'=>'JC Carlo',
          'last_name'=>'Quintos',
          'email'=>'jolo2@yahoo.com',
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

      $result = $this->vendor->saveUser($data);
      $this->assertNotNull(json_decode($result));
      // $this->assertEquals(200, $result->getStatusCode());
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
      // $this->assertEquals(200, $result->getStatusCode());
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
      // $this->assertEquals(200, $result->getStatusCode());
    }

    public function destroyUser() {
      $result = $this->vendor->destroyUser(12711);
      // $this->assertEquals(200, $result->getStatusCode());
    }




  }//close VendorTest class
?>
