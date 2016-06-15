<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-15
 * Time: 14:25
 */
include("../src/Xcache/XcacheInterface.php");
include("../src/Xcache/Xcache.php");

$xcache = \Nsc\Xcache\Xcache::getInstance();
$a = 'nsc';
//数组
$arr = array(1,2,3,4,5,6);
$arr2 = array(7,8,9);
$xcache->set($a,$arr);
$xcache->inc($a,$arr2);
var_dump($xcache->get($a));
//字符串
$b = 'ceshi';
$xcache->set($b,'abcd');
$xcache->inc($b,'efg');
var_dump($xcache->get($b));