<?php

namespace DPD\Exception;

use DPD\Exception;

abstract class Response extends Exception {

	public function __construct($message, $response = NULL) {
		$string = $message;
		if ($response) $string .= " ($response)";
		parent::__construct($string);
	}
}
 