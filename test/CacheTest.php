<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-16
 * Time: 15:25
 */
class CacheTest extends PHPUnit_Framework_TestCase
{
    private $config = [
        'GROUP'  => 'ceShi'
    ];
    private $cache;
    protected function setUp()
    {
        $this->cache = new Nsc\Cache\Cache($this->config);
    }
    public static function provider()
    {
        return array(
            array('nsc', 23, 1800),
            array('c', 8, 1800),
            array('a', [1,2,3,4,5,6], 1800),
            array('b', "hello world", 1800),
        );
    }
    /**
     * @dataProvider provider
     */
    public function testSet($key,$value,$expire){
        $this->cache->set($key,$value,$expire);
    }
    /**
     * @dataProvider provider
     * @depends testSet
     */
    public function testGet($key){
        $this->assertEquals(1,$this->cache->exists($key));
        $this->cache->get($key);
    }
    /**
     * @depends testSet
     */
    public function testInc(){
        $this->cache->inc('nsc',2);
        $this->assertEquals(25,$this->cache->get('nsc'));
    }
    /**
     * @depends testSet
     */
    public function testDec(){
        $this->cache->dec('c');
        $this->assertEquals(7,$this->cache->get('c'));
    }
    /**
     * @dataProvider provider
     * @depends testSet
     */
    public function testClear($key){
        $this->cache->clear();
        $this->assertEquals(0,$this->cache->exists($key));
    }
    /**
     * @depends testSet
     */
    public function testDelete(){
        $this->cache->delete('nsc');
        $this->assertEquals(0,$this->cache->exists('nsc'));
    }

}