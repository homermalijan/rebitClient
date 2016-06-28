<?php
  require 'Recipient.php';

  class RecipientTests extends PHPUnit_Framework_TestCase{
    private $recipient;

    protected function setUp(){
      $this->recipient = new Recipient('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
    }

    protected function tearDown(){
      $this->recipient = NULL;
    }

    // public function testShowAll(){
    //   $result = $this->recipient->showAll(10876, 12677);
    //   $this->assertEquals(200, $result->getStatusCode());
    // }//close showAllTest

    public function testSave(){
      $post_data = array(
        'recipient' => array(
          'first_name' => 'homer',
          'last_name' => 'malijan',
          'email' => 'hcmalijan@up.edu.ph',
          'mobile' => '09061571969'
        )
      );

      $result = $this->recipient->save(10876, $post_data);
      $this->assertEquals(200, $result->getStatusCode());
    }//close testSave

    public function testUpdate(){
      $put_data = array(
        'recipient' => array(
          'first_name' => 'homer',
          'last_name' => 'malijan',
          'email' => 'hcmalijan@up.edu.ph',
          'mobile' => '09061571969'
        )
      );

      $result = $this->recipient->update(10876, 48291, $put_data);
      $this->assertEquals(200, $result->getStatusCode());
    }//close testUpdate

    public function testShowAll(){
      $result = $this->recipient->showAll(10876);
      $this->assertequals(200, $result->getStatusCode());
    }

    public function testShowInfo(){
      $result = $this->recipient->showInfo(10876, 48291);
      $this->assertequals(200, $result->getStatusCode());
    }


  }//close RecipientTest class
?>
