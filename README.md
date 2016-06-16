# Cache
Cache connects and manages database based on application programming interface (**API**)

## Highlights

- Simple API
- Composer ready, [PSR-2] and [PSR-4] compliant
- Fully documented
- Demo

## System Requirements

You need:

- **PHP >= 5.5** , but the latest stable version of PHP is recommended

to use the library.

-**Xcache>=3.1.0**

## Install

Install nsc\cache using Composer.

    $ composer require nsc/cache

## Config
```
$config = [
       'GROUP'  => 'ceShi',
        ];
```

## Basic Usage

    include("../vendor/autoload.php");
    $cache = \Nsc\cache\Cache::getInstance($config);
    $a = 'nsc';
    $arr = array(1,2,3,4,5,6);
    $cache->set($a,$arr);
    var_dump($cache->get($a));