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
    /**
     * assign  delete key
     *
     * @param mixed $key
     * @return void
     */
    public function assign($key)
    {
        xcache_unset($key);
    }
    /**
     * dec
     *
     * @param mixed $key
     * @param mixed $value
     * @param mixed $expire
     * @return void
     */
    public function dec($key, $value, $expire = null)
    {
        if(!$this->exists($key))return;
        $expire = $expire?:$this->expire;
        $primaryValue = $this->get($key);
        //输入int
        if((is_int($value)||is_integer($value))&&is_int($primaryValue))xcache_dec($key,$value,$expire);
        //输入字符串
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
            $arrValue = array_keys($primaryValue,$value);
            if($arrValue){             //输入数组的值
                foreach($arrValue as $v){
                    unset($primaryValue[$v]);
                }
            }
            $arrKey = array_key_exists($value,$primaryValue);
            if($arrKey) {     //输入数组的键
                unset($primaryValue[$value]);
            }
            if(empty($arrValue)&&!$arrKey)return;
            $this->set($key,$primaryValue,$expire);
        }
        return;
    }
    /**
     * inc  The same type to a merger or add
     *
     * @param mixed $key
     * @param mixed $value
     * @param mixed $expire
     * @return void
     */
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
    /**
     * clear  clearAlL   $type choose 1 or 0
     * I suggest you use caution with this one.
     *
     * @param int $type
     * @param int $key
     * @return void
     */
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
            $this->assign($key);
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

    }

    /**
     * close  Do not implement the method
     *
     */
    public function close()
    {
        xcache_coverager_stop();
    }
}