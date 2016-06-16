# APIs

本文档将提供 Cache API 介绍

## Interface CacheInterface
### Description

Cache Interface
- author: Nsc <18810487612@163.com>
- version: 1.0.0

*Located in /cache/CacheInterface.php (line 12)*

### Method Summary

- void set($key,$value,$expire = null)
- int/String/array get($key)
- boolean exists($key)
- boolean delete($key)
- void dec($key, $value = 1, $expire = null);
- void inc($key, $value = 1, $expire = null);
- void clear()

### Methods

#### set (line 28)
set Cache
- access:public
- mixed $key
- mixed $value
- int $expire
void set($key,$value,$expire = null)

#### get (line 35)
get Cache Database
- access:public
String/int/array get($key)

#### exists (line 42)
Determine whether the cache
- access:public
boolean exists($key)

#### delete (line 49)
delete Cache database
- access:public
boolean delete($key)

#### dec (line 57)
Subtracter
- access:public
- param int $key
- param int $value
- param int $expire
void dec($key,$value,$expire=null)

#### inc (line 65)
Summator
- access:public
- param int $key
- param int $value
- param int $expire
void inc($key,$value,$expire=null)

#### clear (line 73)
Clear All
- access:public
void clear()

