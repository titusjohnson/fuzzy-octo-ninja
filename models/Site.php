<?php
class Site {

	var $domain = "";
	var $portal = null;
	var $log    = "";
	var $tpl    = "";
	var $db     = null;


	function __construct() {
		$this->log = new loggar($_SERVER["DOCUMENT_ROOT"]."/logs/");

		$this->registerErrors();
		$this->initDb();
		$this->resolveDomain();

		$this->tpl = new fTemplating($_SERVER["DOCUMENT_ROOT"]."/themes/default/");
	}

	/**
	 *  Build a Flourish DB object and attach the ORM
	 */
	private function initDb() {
		try {
			$this->db = new fDatabase("mysql", "framework", "root", "root");
			fORMDatabase::attach($this->db);
		}
		catch(fConnectivityException $e) {
			$this->log->logFatal(sprintf("Failed to initialize database. %s", $this->db));
			ToroHook::fire("500");
		}
	}

	/**
	 * Check the domain and see if we have it
	 */
	private function resolveDomain() {
		try {
			$domain = ltrim(fURL::getDomain(), "http\:\/\/");
			$domain = rtrim($domain, "/");
			$this->domain = new Domain($domain);
		}
		catch(fNotFoundException $e) {
			$this->log->logFatal(sprintf("Failed to find domain, '%s', as requested.", fURL::getDomain()));
			ToroHook::fire("404");
		}
	}

	/**
	 * Register our Toro hooks for errors
	 */
	private function registerErrors() {
		ToroHook::add("404", function(){
			Errors::FourOhFour();
		});
		ToroHook::add("500", function(){
			Errors::FiveHundred();
		});
	}
}