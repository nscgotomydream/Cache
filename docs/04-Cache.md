## Class Cache
### Description

Implements interfaces:

- CacheInterface

Cache

connect and manage CacheInterface by inheriting interface of CacheInterface

*Located in /Cache/Cache.php (line 12)*

### Method Summary

- Cache __construct([$config = array()])
- void set($key,$value,$expire = null)
- int/String/array get($key)
- boolean exists($key)
- boolean delete($key)
- void dec($key, $value = 1, $expire = null);
- void inc($key, $value = 1, $expire = null);
- void clear()

### Methods

#### Constructor __construct (line 23)
constructor $config
- access:public

Cache __construct([$config = array()])

- $config

#### set (line 33)
set Cache
- access:public
- mixed $key
- mixed $value
- int $expire
void set($key,$value,$expire = null)

---
*Implementation of:*
CacheInterface::set()
- set Cache database

#### get (line 38)
get Cache Database
- access:public
String/int/array get($key)

---
*Implementation of:*
CacheInterface::get()
- get Cache database

#### exists (line 42)
Determine whether the cache
- access:public
boolean exists($key)

---
*Implementation of:*
CacheInterface::exists()
- Determine whether the cache

#### dec (line 54)
Subtracter
- access:public
- param int $key
- param int $value
- param int $expire
void dec($key,$value,$expire=null)

---
*Implementation of:*
CacheInterface::dec()
- execute  sub  counter

#### inc (line 69)
Summator
- access:public
- param int $key
- param int $value
- param int $expire
void inc($key,$value,$expire=null)

---
*Implementation of:*
CacheInterface::inc()
- execute  add counter

#### clear (line 82)
Clear All
- access:public
void clear()

---
*Implementation of:*
CacheInterface::clear()
- execute  clear All cache database

#### delete (line 93)
delete Cache database
- access:public
boolean delete($key)

---
*Implementation of:*
CacheInterface::delete()
- execute  Delete the specified cache data

















