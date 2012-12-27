PhantomJS Runner
================

A PHP library to execute PhantomJS scripts and return
their results.


0.0 Table of Contents
---------------------

* Introduction
* Examples
* Troubleshooting
* Changelog


1.0 Introduction
----------------

This library provides a simple wrapper around PhantomJS to
facilitate running scripts and capturing their output. This
script relies on PhantomJS already been installed on the
target system.


2.0 Examples
------------

```php
$phantomjs = new HybridLogic\PhantomJS\Runner;
$result = $phantomjs->execute(dirname(__FILE__) . '/script.js', $arg1, $arg2);
```


3.0 Troubleshooting
-------------------

Nothing here yet.


4.0 Changelog
-------------

* **[2012-12-17]** Initial Version
* **[2012-12-27]** Added Package docs
