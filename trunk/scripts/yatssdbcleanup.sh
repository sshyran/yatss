#!/bin/sh

dbname=yatss
dbusername=root
dbpassword=admin
dbtable=basket
dbbatchfile=/Users/roll/Sites/paxton/yatss/scripts/delete_outdated_transactions.sql
mysql_command=/Applications/xampp/xamppfiles/bin/mysql

# check the path. find mysql
$mysql_command --batch -D $dbname -u $dbusername --password=$dbpassword < $dbbatchfile