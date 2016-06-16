<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-15
 * Time: 18:44
 */
include("../vendor/autoload.php");

$xcache = \Nsc\Xcache\Xcache::getInstance();
$a ='nsc';
$b = 'test';
$arr = array(1,2,3,4,5,6);
$arr1 = array("a"=>"b","b"=>"c","c"=>"d");
$xcache->set($a,$arr);
$xcache->set($b,$arr1);
var_dump($xcache->get($a));
var_dump($xcache->get($b));
//$xcache->clear(1);
$xcache->dec($a,2);
$xcache->dec($b,"f");
var_dump($xcache->get($a));
var_dump($xcache->get($b));