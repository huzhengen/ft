<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-09-07
 * Time: 15:15:27
 */
$GLOBALS['FFCONFIG']['MYSQL_HOST'] = 'localhost';
$GLOBALS['FFCONFIG']['MYSQL_USER'] = 'root';
$GLOBALS['FFCONFIG']['MYSQL_PASSWORD'] = 'root';
$GLOBALS['FFCONFIG']['MYSQL_DBNAME'] = 'fangtangdb';
$GLOBALS['FFCONFIG']['MYSQL_PORT'] = '3306';
$GLOBALS['FFCONFIG']['DSN'] = 'mysql:host='. $GLOBALS['FFCONFIG']['MYSQL_HOST'] .'port='. $GLOBALS['FFCONFIG']['MYSQL_PORT'] .';dbname='. $GLOBALS['FFCONFIG']['MYSQL_DBNAME'];

$dbh = new PDO(c('DSN'), c('MYSQL_USER'), c('MYSQL_PASSWORD'));