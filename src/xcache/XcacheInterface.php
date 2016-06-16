<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-06-07
 * Time: 10:23
 */

namespace Nsc\Xcache;


interface XcacheInterface
{
    /**
     * version
     *
     * @access public
     * @return String
     */
    public function version();
    /**
     * set
     *
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function set($key,$value,$expire = null);
    /**
     * get
     *
     * @param mixed $key
     * @return   String/array
     */
    public function get($key);
    /**
     * exists   replace  isset
     *
     * @param mixed $key
     * @return boolean
     */
    public function exists($key);
    /**
     * assign   replace   unset
     *
     * @param mixed $key
     * @return boolean
     */
    public function assign($key);
    /**
     * replace
     *
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function replace($key,$value,$expire = null);
    /**
     * delete
     *
     * @param mixed $key
     * @return void
     */
    public function delete($key);
    /**
     * set
     *
     * @param mixed $key
     * @param int $value
     * @return boolean
     */
    public function dec($key, $value, $expire = null);
    /**
     * set
     *
     * @param mixed $key
     * @param mixed $value
     * @return void
     */
    public function inc($key, $value, $expire = null);
    /**
     * clear
     *
     * @param int $type
     * @param int $key
     * @return void
     */
    public function clear($type,$key="-1");
    /**
     * close
     *
     * @access public
     * @return void
     */
    public function close();
}