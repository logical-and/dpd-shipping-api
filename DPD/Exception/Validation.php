<?php

namespace DPD\Exception;

use DPD\Exception;
use Symfony\Component\Validator\ConstraintViolationListInterface;

class Validation extends Exception {

	public function __construct(ConstraintViolationListInterface $violations) {

		parent::__construct((string) $violations);
	}

}