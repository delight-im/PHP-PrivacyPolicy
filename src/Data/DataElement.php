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
	/** @var bool whether the information is directly viewable by the user somewhere via the user interface */
	private $viewable;
	/** @var bool whether the information is directly deletable by the user somewhere via the user interface */
	private $deletable;

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
	 * Returns whether the information is directly viewable by the user somewhere via the user interface
	 *
	 * @return bool
	 */
	public function isViewable() {
		return $this->viewable;
	}

	/**
	 * Returns whether the information is directly deletable by the user somewhere via the user interface
	 *
	 * @return bool
	 */
	public function isDeletable() {
		return $this->deletable;
	}

	/**
	 * Creates a new individual data element
	 *
	 * @param string $type one of the constants from the {@see DataType} class
	 * @param string|null $requirement (optional) one of the constants from the {@see DataRequirement} class
	 * @param bool|null $maxRetention (optional) the maximum retention time of the information in hours
	 * @param bool|null $viewable (optional) whether the information is directly viewable by the user somewhere via the user interface
	 * @param bool|null $deletable (optional) whether the information is directly deletable by the user somewhere via the user interface
	 */
	public function __construct($type, $requirement = null, $maxRetention = null, $viewable = null, $deletable = null) {
		$this->type = (string) $type;
		$this->requirement = $requirement !== null ? ((string) $requirement) : DataRequirement::ALWAYS;
		$this->maxRetention = $maxRetention !== null ? ((int) $maxRetention) : null;
		$this->viewable = (bool) $viewable;
		$this->deletable = (bool) $deletable;
	}

}
