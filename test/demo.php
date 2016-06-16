<?php
include("../vendor/autoload.php");

   $config = [
       'GROUP'  => 'ceShi'
        ];

$xcache = \Nsc\cache\Cache::getInstance($config);
$a = 'nsc';
if($xcache->exists($a)){
    var_dump($xcache->get($a));
}
$array = array(1,2,3,4,5,6,7,8);
$xcache->set($a,'adgfge');
$xcache->set('arr',$array);
$xcache->set('1',12);
//var_dump($cache->get($a));
//$cache->assign($a);
//$cache->delete($a);
//$cache->clear(1);
$xcache->inc('1');
$xcache->dec('1',2);
$xcache->replace($a,'cfg');
$xcache->delete($a);
var_dump($xcache->get('1'));
var_dump($xcache->get($a));
var_dump($xcache->get('arr'));
$xcache->clear();
var_dump($xcache->get('1'));
var_dump($xcache->get($a));
var_dump($xcache->get('arr'));


