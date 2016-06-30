# rebitClient
rebit client; SCI project

1. install php 5.6 or above
  -sudo add-apt-repository ppa:ondrej/php5-5.6
  -sudo apt-get update
  -sudo apt-get install python-software-properties
  -sudo apt-get update
  -sudo apt-get install php5

commands taken from: https://www.dev-metal.com/install-setup-php-5-6-ubuntu-14-04-lts/

2. install composer
  -sudo apt-get update
  -sudo apt-get install curl php5-cli git
  -curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
  
commands taken from: https://www.digitalocean.com/community/tutorials/how-to-install-and-use-composer-on-ubuntu-14-04

3. clone repository
  run at desired path:
  -git clone https://github.com/hoommaah/rebitClient.git
  
4. composer install
  -run 'composer install' inside rebitClient folder

commands for running tests on classes:
-use 'phpunit VendorTest.php',
-use 'phpunit RecipientTest.php',
-use 'phpunit RemittanceTest.php', and
-use 'phpunit UserTest.php'

models to require:
-require 'Vendors.php',
-require 'User.php',
-require 'Recipient.php', and
-require 'Remittance.php'

