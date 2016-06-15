<?php
include("../src/Xcache/XcacheInterface.php");
include("../src/Xcache/Xcache.php");

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
//var_dump($Xcache->get($a));
//$Xcache->assign($a);
//$Xcache->delete($a);
//$Xcache->clear(1);
var_dump($xcache->get('1'));
var_dump($xcache->get($a));
var_dump($xcache->get('arr'));


