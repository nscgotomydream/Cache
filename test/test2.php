<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-15
 * Time: 18:44
 */
include("../vendor/autoload.php");

$xcache = \Nsc\Xcache\Xcache::getInstance();
$a = 2;
$arr = array(1,2,3,4,5,6);
$xcache->set($a,$arr);
var_dump($xcache->get($a));
$xcache->clear(1);
var_dump($xcache->get($a));