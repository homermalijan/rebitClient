<?php
  use GuzzleHttp\Client;
  use GuzzleHttp\Psr7\Request;

  chdir(dirname(__DIR__));

  require 'vendor/autoload.php';

  class clientCreator{
    private static $client;

    public static function getInstance(){
      if(!self::$client){
        self::$client = new GuzzleHttp\Client([      //create new vendor client
          'base_uri' => 'https://rebit.ph/api/v1/',
        ]);
      }
      return self::$client;
    }

  }//close class
?>
