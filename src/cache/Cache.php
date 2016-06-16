<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-13
 * Time: 16:26
 */

namespace Nsc\cache;


class Cache implements CacheInterface
{
    private static $_instance = null;
    private     $ver        = 0;
    private     $_config    = array();
    public      $group      = '';
    private $expire = 1800;
    /**
     * default save time
     * @access private
     * @var int
     **/
    private function __construct($config = array())
    {
        $this->_config = $config;
        if(empty($config)) {
            $config['GROUP'] = 'tag';
        }
        $this->group = $config['GROUP'];
        $this->ver = intval( $this->get($this->group.'_ver') );
    }
    private function __clone(){}
    /**
     * getInstance
     *
     * @static
     * @param array $config
     * @access public
     * @return object XCache instance
     */
    public static function getInstance($config = array()){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self($config);
        }
        return self::$_instance;
    }

    public function set($key, $value, $expire = null)
    {
        $expire = $expire?:$this->expire;
        xcache_set($this->group.'_'.$this->ver.'_'.$key,$value,$expire);
    }
    public function get($key)
    {
        return xcache_get($this->group.'_'.$this->ver.'_'.$key);
    }
    public function exists($key)
    {
        return xcache_isset($this->group.'_'.$this->ver.'_'.$key);
    }
    /**
     * dec
     *
     * @param mixed $key
     * @param mixed $value
     * @param mixed $expire
     * @return void
     */
    public function dec($key, $value = 1, $expire = null)
    {
        $expire = $expire?:$this->expire;
        if(!$this->exists($key))return;
        if(!is_int($value))return;
        xcache_dec($this->group.'_'.$this->ver.'_'.$key,$value,$expire);
    }
    /**
     * inc  The same type to a merger or add
     *
     * @param mixed $key
     * @param mixed $value
     * @param mixed $expire
     * @return void
     */
    public function inc($key, $value =1, $expire = null)
    {
        $expire = $expire?:$this->expire;
        if(!$this->exists($key))return;
        if(!is_int($value))return;
        xcache_inc($this->group.'_'.$this->ver.'_'.$key,$value,$expire);
    }
    /**
     * clear  clearAlL   $type choose 1 or 0
     * I suggest you use caution with this one.
     *
     * @param int $type
     * @param int $key
     * @return void
     */
    public function clear()
    {
        $this->ver = $this->ver + 1;
        $this->set($this->group.'_ver', $this->ver);
    }
    /**
     * delete  Delete the specified key
     *
     * @param mixed $key
     * @return boolean
     */
    public function delete($key)
    {
        $bool = false;
        if($this->exists($key)){
            xcache_unset($this->group.'_'.$this->ver.'_'.$key);
            $bool = true;
        }
        return $bool;
    }

    /**
     * version  Do not implement the method
     *
     */
    public function version()
    {
        return "1.0.0";
    }

    /**
     * close  Do not implement the method
     *
     */
    public function close()
    {
        return null;
    }
}