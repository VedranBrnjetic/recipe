Procedure to move a vagrant laravel project to clean new AWS EC2 t2.micro box:

———- Installing Apache ———-

$ sudo apt-get install apache2 

———- Installing Latest PHP ———-

$ sudo add-apt-repository ppa:ondrej/php5

$ sudo apt-get update

$ sudo apt-get install php5 libapache2-mod-php5

———- Installing PHP Mcrypt ext. ———-

$ sudo apt-get install php5-mcrypt

———- Installing MYSQL ———-
//root no password
$sudo apt-get install mysql-server
$sudo apt-get install php5-mysql

———- Installing GIT ———-

$ sudo apt-get install git-core

———- Laravel recipe GIT Repo ———-
$ cd /var/www/http
$ sudo git clone https://github.com/VedranBrnjetic/recipe.git .

———- Installing Composer ———-
$ sudo chmod -R 777 recipe/
$ sudo chown www-data recipe/
$ cd recipe
$ sudo curl -sS https://getcomposer.org/installer | php
$ sudo php composer.phar install

———- Create database ———-
$ echo "create database recipe" | mysql -u root
$ echo "grant all privileges on recipe.* to 'MasterChef'@'localhost' identified by 'g1vemethe1ngred1ents';" | mysql -u root

———- Configure environment ———-
$ sudo php artisan key:generate
$ sudo cp /var/www/html/env_config/apache2.conf /etc/apache2/apache2.conf
$ sudo cp /var/www/html/env_config/000-default.conf /etc/apache2/sites-available/000-default.conf
$ sudo a2enmod rewrite
$ sudo service apache2 restart
$ curl http://localhost/database
