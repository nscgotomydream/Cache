<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-13
 * Time: 16:26
 */

namespace Nsc\Xcache;


class Xcache implements XcacheInterface
{
    private static $_instance = null;
    /**
     * default save time
     * @access private
     * @var int
     **/
    private $expire = "1800";
    private function __construct()
    {
    }
    private function __clone(){}
    /**
     * getInstance
     *
     * @static
     * @access public
     * @return object XCache instance
     */
    public static function getInstance(){
        if(!(self::$_instance instanceof self)){
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function set($key, $value, $expire = null)
    {
        $expire = $expire?:$this->expire;
        xcache_set($key,$value,$expire);
    }
    public function get($key)
    {
        return xcache_get($key);
    }
    public function exists($key)
    {
        return xcache_isset($key);
    }

    public function assign($key)
    {
        xcache_unset($key);
    }

    public function dec($key, $value, $expire = null)
    {
        if(!$this->exists($key))return;
        $expire = $expire?:$this->expire;
        $primaryValue = $this->get($key);
        if((is_int($value)||is_integer($value))&&is_int($primaryValue))xcache_dec($key,$value,$expire);
        if(is_string($value)&&is_string($primaryValue)){
            if(strpos($primaryValue,$value)){
                $arr = explode($value,$primaryValue);
                $newValue = "";
                foreach($arr as $v){
                    $newValue.=$v;
                }
                $this->set($key,$newValue,$expire);
            }
            return;
        }
        if(is_array($primaryValue)&&in_array($value,$primaryValue)){
            $arr = array_keys($primaryValue,$value);
            if(empty($arr))return;
            foreach($arr as $v){
                unset($primaryValue[$v]);
            }
            $this->set($key,$primaryValue,$expire);
        }
        return;
    }
    public function inc($key, $value, $expire = null)
    {
        if(!$this->exists($key))return;
        $expire = $expire?:$this->expire;
        $primaryValue = $this->get($key);
        if((is_int($value)||is_integer($value))&&is_int($primaryValue))xcache_inc($key,$value,$expire);
        if(is_string($value)&&is_string($primaryValue))$this->set($key,$primaryValue.$value,$expire);
        if(is_array($value)&&is_array($primaryValue))$this->set($key,array_merge($primaryValue,$value),$expire);
        return;
    }
    public function clear($type,$key="-1")
    {
        xcache_clear_cache($type,$key);
    }

    public function replace($key, $value, $expire = null)
    {
        $expire = $expire?:$this->expire;
        $this->assign($key);
        $this->set($key,$value,$expire);
    }
    public function delete($key)
    {
        $this->exists($key)?$this->assign($key):null;
    }

    public function version()
    {

    }

    public function close()
    {
        // TODO: Implement close() method.
    }
}