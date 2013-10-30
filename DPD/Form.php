<?php

namespace DPD;

abstract class Form {

	public static function newInstance() {
		return new static;
	}

	public function toArray() {
		return get_object_vars($this);
	}
}
 