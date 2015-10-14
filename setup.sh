#!/bin/bash
# script to set up vhero vuln app in ubuntu
# Jake Bernier
# createDB.php & insertDB.php use SQL credentials in './include/sqlz.php'
# Ensure lamp stack is installed
#	sudo apt-get update
#	sudo apt-get install lamp-server^
# Ensure vhero code is in web root directory
#	mv vhero/* /var/www/html/
########################################
php createDB.php
php insertDB.php
rm createDB.php
rm insertDB.php
# give apache2 ownership of uploads directory
sudo chown -R www-data:www-data auth/uploads/
echo "done...."