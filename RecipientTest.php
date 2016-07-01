<?php
  require 'Recipient.php';

  class RecipientTest extends PHPUnit_Framework_TestCase{
    private $recipient;

    protected function setUp(){
      $this->recipient = new Recipient('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
    }

    protected function tearDown(){
      $this->recipient = NULL;
    }

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
      $this->assertNotNull(json_decode($result));
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
      $this->assertNotNull(json_decode($result));
    }//close testUpdate

    public function testShowAll(){
      $result = $this->recipient->showAll(10876);
      $this->assertInternalType('array', $result);
    }//close testShowAll

    public function testShowInfo(){
      $result = $this->recipient->showInfo(10876, 48291);
      $this->assertNotNull(json_decode($result));
    }//close testShowInfo

  }//close RecipientTest class
?>
