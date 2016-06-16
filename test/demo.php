<?php
include("../vendor/autoload.php");

   $config = [
       'GROUP'  => 'ceShi'
        ];

$cache = new \Nsc\cache\Cache($config);
$a = 'nsc';

$array = array(1,2,3,4,5,6,7,8);
$cache->set($a,'adgfge');
$cache->set('arr',$array);
$cache->set('int',12);
//var_dump($Cache->get($a));
//$Cache->assign($a);
//$Cache->delete($a);
//$Cache->clear(1);
/*$Cache->inc('1');
$Cache->dec('1',2);
$Cache->delete($a);*/
echo $cache->get($a)."\n";
print_r($cache->get('arr'));
echo $cache->get('int')."\n";

/*$Cache->clear();
var_dump($Cache->get('1'));
var_dump($Cache->get($a));
var_dump($Cache->get('arr'));*/


