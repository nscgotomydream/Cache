# Xcache
Xcache connects and manages database based on application programming interface (**API**)

## Highlights

- Simple API
- Composer ready, [PSR-2] and [PSR-4] compliant
- Fully documented
- Demo

## System Requirements

You need:

- **PHP >= 5.4** , but the latest stable version of PHP is recommended

to use the library.

-**Xcache>=3.0.0**

## Install

Install nsc\xcache using Composer.

    $ composer require nsc/xcache

## Config
```
$config = [
       'GROUP'  => 'ceShi',
        ];
```

## Basic Usage

    include("../vendor/autoload.php");
    $xcache = \Nsc\cache\Cache::getInstance($config);
    $a = 'nsc';
    $arr = array(1,2,3,4,5,6);
    $xcache->set($a,$arr);
    var_dump($xcache->get($a));