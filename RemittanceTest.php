<?php
  require 'Remittance.php';

  class RemittanceTests extends PHPUnit_Framework_TestCase{
    private $remittance;

    protected function setUp(){
      $this->remittance = new Remittance('xZ4A1TuPxx-Vyywo1FanrvxGH59ZCs6X');
    }

    protected function tearDown(){
      $this->remittance = NULL;
    }

    public function testSave(){
      $post_data = array(
        'recipient_id' => '48531',
        'remittance' => array(
          'amount' => '100',
          'currency' => 'PHP',
          'strategy' => 'pickup'
        ),
        'remmitance_details' => array(
          'bank' => 'ABC'
        )
      );

      $result = $this->remittance->save(10876, $post_data);
      $this->assertEquals(200, $result->getStatusCode());
    }

    public function testCompute(){
      $post_data = array(
        'amount' => '100',
        'currency' => 'PHP',
        'strategy' => 'pickup',
        'provider' => 'ABC',
        'province' => 'Abra'
      );

      $result = $this->remittance->compute(10876, $post_data);
      $this->assertEquals(200, $result->getStatusCode());
    }

    public function testShowAll(){
      $result = $this->remittance->showAll(10876);
      $this->assertEquals(200, $result->getStatusCode());
    }

    public function testShowInfo(){
      $result = $this->remittance->showInfo(10876, 54050);
      $this->assertEquals(200, $result->getStatusCode());
    }
  }//close RemittanceTest class
?>
