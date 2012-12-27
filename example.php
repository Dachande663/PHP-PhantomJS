<?php

include './Runner.php';

$phantomjs = new HybridLogic\PhantomJS\Runner;

$script = dirname(__FILE__) . '/script.js'; // Full path to the script to execute

$result = $phantomjs->execute($script, $arg1, $arg2);

var_dump($result);