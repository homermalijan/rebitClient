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
      echo "\ntesting showInfo: ";
      $result = $this->vendor->showInfo();
      $this->assertNotNull(json_decode($result));
    }

    public function testShowOne() {
      $result = $this->vendor->showOne(10876);
      $this->assertNotNull(json_decode($result));
    }

    public function testShowAll() {
      $result = $this->vendor->showAll();
      $this->assertInternalType('array', json_decode($result));
    }

    public function testShowByEmail() {
      $result = $this->vendor->showByEmail('jomel150@yahoo.com');
      $this->assertNotNull(json_decode($result));
    }

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
    }

    public function testUpdate(){
      $data = array(
        'vendor'=> array(
          'id'=> 1,
          'name'=> 'Homer Malijan',
          'url'=> 'https://www.facebook.com/homercm?fref=ts',
          'logo_url'=> 'https://www.facebook.com/photo.php?fbid=743409902367960&set=a.142787619096861.31006.100000968726741&type=3&theater',
          'phone'=> '09179206xxx',
          'email'=> 'hcmalijan@up.edu.ph',
          'active'=> true,
          'user_ids'=> [
            1,
            2,
            3
          ]
        ),
      );
      $result = $this->vendor->update($data);
      $this->assertNotNull(json_decode($result));
      // $this->assertEquals(200, $result->getStatusCode());
    }

    public function testUpdateUser(){
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

      $result = $this->vendor->updateUser(10876, $data);
      $this->assertNotNull(json_decode($result));
      // $this->assertEquals(200, $result->getStatusCode());
    }

    public function destroyUser() {
      $result = $this->vendor->destroyUser(10900);
      $this->assertInternalType('array', json_decode($result));
      // $this->assertEquals(200, $result->getStatusCode());
    }
  }//close VendorTest class
?>
