<?php
include("../src/xcache/XcacheInterface.php");
include("../src/xcache/Xcache.php");

$xcache = \Nsc\Xcache\Xcache::getInstance();
$a = 'nsc';
if($xcache->exists($a)){
    var_dump($xcache->get($a));
}
$array = array(1,2,3,4,5,6,7,8);
$xcache->set($a,'adgfge');
$xcache->set('arr',$array);
$xcache->set('1',2335);
$xcache->inc($a,5);
//var_dump($xcache->get($a));
//$xcache->assign($a);
//$xcache->delete($a);
//$xcache->clear(1);
var_dump($xcache->get('1'));
var_dump($xcache->get($a));
var_dump($xcache->get('arr'));


