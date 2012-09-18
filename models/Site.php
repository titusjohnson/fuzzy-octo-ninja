<?php
class Site {

	var $domain = "";
	var $portal = null;
	var $log   = "";


	function __construct() {
		global $log;
		$this->log = $log;

		try {
			$domain = ltrim(fURL::getDomain(), "http\:\/\/");
			$domain = rtrim($domain, "/");
			$domain = new Domain($domain);
			$this->domain = $domain->getName();
		}
		catch(fNotFoundException $e) {
			$this->log->logFatal(sprintf("Failed to find domain, '%s', as requested.", fURL::getDomain()));
			ToroHook::fire("404");
		}
	}
}
