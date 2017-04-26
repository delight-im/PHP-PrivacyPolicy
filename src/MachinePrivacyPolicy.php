<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy;

/** Privacy policy in formal language that can be read by machines */
abstract class MachinePrivacyPolicy extends PrivacyPolicy {

	/** @var bool whether any output should be minified */
	protected $minified;

	/**
	 * Returns whether any output should be minified
	 *
	 * @return bool
	 */
	public function isMinified() {
		return $this->minified;
	}

	/**
	 * Sets whether any output should be minified
	 *
	 * @param bool $minified
	 */
	public function setMinified($minified) {
		$this->minified = (bool) $minified;
	}

	public function __construct() {
		parent::__construct();

		$this->minified = false;
	}

}
