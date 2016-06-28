<?php
	use GuzzleHttp\Client;
	use GuzzleHttp\Psr7\Request;

	chdir(dirname(__DIR__));

	require 'vendor/autoload.php';

	class clientCreator{
		private static $client;

		//return static variable client; creates new instance if null
		public static function getInstance() {
			if(!self::$client) {
				self::$client = new GuzzleHttp\Client([
				  'base_uri' => 'https://rebit.ph/api/v1/',
				]);
			}
			return self::$client;
		}//close getInstance
	}//close class clientCreator
?>
