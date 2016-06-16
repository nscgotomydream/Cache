# Using Cache
本文档将提供Cache的详细使用方法以及相应的使用结果。以XCache为例

## Before Usage
    include("../vendor/autoload.php");

configs信息：
```
$config = [
       'GROUP'  => 'ceShi'   //对数据分组命名
        ];
```

## Basic Usage

### 实例化一个缓存Cache
   $cache = new \Nsc\cache\Cache($config);

### set
```
$a = 'nsc';
$arr = array(1,2,3,4,5,6,7,8);
$cache->set($a,'adgfge');    //缓存字符串类型
$cache->set('arr',$array);   //数组类型
$cache->set('int',12);       //整数类型
```
set函数无返回值

### get
```
$cache->get($a)     //根据键名获取指定的数据
$cache->get('arr')
$cache->get('int')
```
get函数会依据缓存值的类型返回数据
```
adgfge
Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
    [5] => 6
    [6] => 7
    [7] => 8
)
12
```

### exists
```
$cache->exists($a)    //输入待判断缓存是否存在的键
```
exists函数该键名的缓存返回true or false  boolean 类型

### dec
```
$cache->dec('int',2);  //第一个参数键名，[第二个参数为计数器减少数组默认为1]
```
dec函数参数均为int类型，对于其他类型无法计算

### inc
```
$cache->inc('int',3)    //第一个参数键名，[第二个参数为计数器减少数组默认为1]
```
inc函数参数均为int类型，对于其他类型无法计算

### clear
```
$cache->clear()   //清除所有数据，谨慎使用
```
clear函数无返回值

### delete
```
$cache->delete($a)  //输入键名，删除该缓存
```
delete函数返回boolean类型


