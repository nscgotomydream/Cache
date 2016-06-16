<?php
include("../vendor/autoload.php");

   $config = [
       'GROUP'  => 'ceShi'
        ];

$cache = new \Nsc\cache\Cache($config);
$a = 'nsc';
if($cache->exists($a)){
    var_dump($cache->get($a));
}
$array = array(1,2,3,4,5,6,7,8);
$cache->set($a,'adgfge');
$cache->set('arr',$array);
$cache->set('1',12);
//var_dump($cache->get($a));
//$cache->assign($a);
//$cache->delete($a);
//$cache->clear(1);
$cache->inc('1');
$cache->dec('1',2);
$cache->delete($a);
var_dump($cache->get('1'));
var_dump($cache->get($a));
var_dump($cache->get('arr'));
$cache->clear();
var_dump($cache->get('1'));
var_dump($cache->get($a));
var_dump($cache->get('arr'));


