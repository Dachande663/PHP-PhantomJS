<?php

namespace HybridLogic\PhantomJS;

/**
 * PhantomJS Command Runner
 *
 * $command = new \HybridLogic\PhantomJS\Runner;
 * $result = $command->execute('\www\test.js', 'http://mysite.com', 'another-arg');
 *
 * @package PhantomJS
 **/
class Runner {


	/**
	 * @var string Path to phantomjs binary
	 **/
	private $bin = '/usr/local/bin/phantomjs';


	/**
	 * @var bool If true, all Command output is returned verbatim
	 **/
	private $debug = false;


	/**
	 * Constructor
	 *
	 * @param string Path to phantomjs binary
	 * @param bool Debug mode
	 * @return void
	 **/
	public function __construct($bin = null, $debug = null) {
		if($bin !== null) $this->bin = $bin;
		if($debug !== null) $this->debug = $debug;
	} // end func: __construct



	/**
	 * Execute a given JS file
	 *
	 * This method should be called with the first argument
	 * being the JS file you wish to execute. Additional
	 * PhantomJS command line arguments can be passed
	 * through as function arguments e.g.:
	 *
	 *     $command->execute('/path/to/my/script.js', 'arg1', 'arg2'[, ...])
	 *
	 * The script tries to automatically decodde JSON
	 * objects if the first character returned is a left
	 * curly brace ({).
	 *
	 * If debug mode is enabled, this method will return
	 * the output of the command verbatim along with any
	 * errors printed out to the shell. Don't use this mode
	 * in production.
	 *
	 * @param string Script file
	 * @param string Arg, ...
	 * @return bool/array False of failure, JSON array on success
	 **/
	public function execute($script) {

		// Escape
		$args = func_get_args();
		$cmd = escapeshellcmd("{$this->bin} " . implode(' ', $args));
		if($this->debug) $cmd .= ' 2>&1';

		// Execute
		$result = shell_exec($cmd);
		if($this->debug) return $result;
		if($result === null) return false;

		// Return
		if(substr($result, 0, 1) !== '{') return $result; // not JSON
		$json = json_decode($result, $as_array = true);
		if($json === null) return false;
		return $json;

	} // end func: execute



} // end class: Runner