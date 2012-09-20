<?php
class Errors {
	static function FourOhFour() {
		echo "404. Page not found.";
		die;
	}

	static function FiveHundred() {
		echo "500. Server error.";
		die;
	}
}
