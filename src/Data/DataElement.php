<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Data;

/** Individual data element that is collected from the user */
final class DataElement {

	/** @var string one of the constants from the {@see DataType} class */
	private $type;
	/** @var string one of the constants from the {@see DataRequirement} class */
	private $requirement;
	/** @var int|null the maximum retention time of the information in hours */
	private $maxRetention;

	/**
	 * Returns one of the constants from the {@see DataType} class
	 *
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * Returns one of the constants from the {@see DataRequirement} class
	 *
	 * @return string
	 */
	public function getRequirement() {
		return $this->requirement;
	}

	/**
	 * Returns whether a maximum retention time of the information has been defined
	 *
	 * @return bool
	 */
	public function hasMaxRetention() {
		return $this->maxRetention !== null;
	}

	/**
	 * Returns the maximum retention time of the information in hours
	 *
	 * @return int|null
	 */
	public function getMaxRetention() {
		return $this->maxRetention;
	}

	/**
	 * Creates a new individual data element
	 *
	 * @param string $type one of the constants from the {@see DataType} class
	 * @param string|null $requirement (optional) one of the constants from the {@see DataRequirement} class
	 * @param int|null $maxRetention (optional) the maximum retention time of the information in hours
	 */
	public function __construct($type, $requirement = null, $maxRetention = null) {
		$this->type = (string) $type;
		$this->requirement = $requirement !== null ? ((string) $requirement) : DataRequirement::ALWAYS;
		$this->maxRetention = $maxRetention !== null ? ((int) $maxRetention) : null;
	}

}
