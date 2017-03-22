<?php
/**
 * Created by PhpStorm.
 * User: Jurik Kähler
 * Date: 27.06.2016
 * Time: 14:54
 */

require_once 'vendor/j4mie/idiorm/idiorm.php';
require_once 'vendor/j4mie/paris/paris.php';

ORM::configure('mysql:host=localhost;dbname=weather');
ORM::configure('username', 'root');
ORM::configure('password', '');
ORM::configure('driver_options', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

include_once('class/City.php');
include_once('class/CityShop.php');
include_once('class/Data.php');
include_once('class/Helper.php');