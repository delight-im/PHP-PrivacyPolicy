<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Data;

/** Group of data elements that are collected from the user */
final class DataGroup {

	/** @var string the title of the group in natural language */
	private $title;
	/** @var string|null the description of the group and of the circumstances of collection in natural language */
	private $description;
	/** @var string[] any number of constants from the {@see DataBasis} class */
	private $bases;
	/** @var string[] any number of constants from the {@see DataSpecialCondition} class */
	private $specialConditions;
	/** @var string[] any number of constants from the {@see DataPurpose} class */
	private $purposes;
	/** @var string one of the constants from the {@see DataRequirement} class */
	private $requirement;
	/** @var DataElement[] any number of {@see DataElement} instances */
	private $dataElements;

	/**
	 * Returns the title of the group in natural language
	 *
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * Returns whether a description of the group and of the circumstances of collection in natural language has been defined
	 *
	 * @return bool
	 */
	public function hasDescription() {
		return $this->description !== null;
	}

	/**
	 * Returns the description of the group and of the circumstances of collection in natural language
	 *
	 * @return string|null
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Returns whether any constants from the {@see DataBasis} class have been added
	 *
	 * @return bool
	 */
	public function hasBases() {
		return !empty($this->bases);
	}

	/**
	 * Returns any number of constants from the {@see DataBasis} class
	 *
	 * @return string[]
	 */
	public function getBases() {
		return $this->bases;
	}

	/**
	 * Returns whether any constants from the {@see DataSpecialCondition} class have been added
	 *
	 * @return bool
	 */
	public function hasSpecialConditions() {
		return !empty($this->specialConditions);
	}

	/**
	 * Returns any number of constants from the {@see DataSpecialCondition} class
	 *
	 * @return string[]
	 */
	public function getSpecialConditions() {
		return $this->specialConditions;
	}

	/**
	 * Returns whether any constants from the {@see DataPurpose} class have been added
	 *
	 * @return bool
	 */
	public function hasPurposes() {
		return !empty($this->purposes);
	}

	/**
	 * Returns any number of constants from the {@see DataPurpose} class
	 *
	 * @return string[]
	 */
	public function getPurposes() {
		return $this->purposes;
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
	 * Returns whether any {@see DataElement} instances have been added
	 *
	 * @return bool
	 */
	public function hasElements() {
		return !empty($this->dataElements);
	}

	/**
	 * Returns any number of {@see DataElement} instances
	 *
	 * @return DataElement[]
	 */
	public function getElements() {
		return $this->dataElements;
	}

	/**
	 * Adds a new data element to the group
	 *
	 * @param string $type one of the constants from the {@see DataType} class
	 * @param string|null $requirement (optional) one of the constants from the {@see DataRequirement} class
	 * @param int|null $maxRetention (optional) the maximum retention time of the information in hours
	 */
	public function addElement($type, $requirement = null, $maxRetention = null) {
		$this->dataElements[] = new DataElement($type, $requirement, $maxRetention);
	}

	/**
	 * Creates a new group of data elements
	 *
	 * @param string $title the title of the group in natural language, e.g. `Registration data` or `Access logs`
	 * @param string|null $description (optional) the description of the group and of the circumstances of collection in natural language
	 * @param string[]|null $bases (optional) any number of constants from the {@see DataBasis} class
	 * @param string[]|null $specialConditions (optional) any number of constants from the {@see DataSpecialCondition} class
	 * @param string[]|null $purposes (optional) any number of constants from the {@see DataPurpose} class
	 * @param string|null $requirement (optional) one of the constants from the {@see DataRequirement} class
	 * @param callable|null $init (optional) a callback that receives the new instance and may initialize it
	 */
	public function __construct($title, $description = null, array $bases = null, array $specialConditions = null, array $purposes = null, $requirement = null, callable $init = null) {
		$this->title = (string) $title;
		$this->description = ($description !== null) ? ((string) $description) : null;
		$this->bases = ($bases !== null) ? ((array) $bases) : [];
		$this->specialConditions = ($specialConditions !== null) ? ((array) $specialConditions) : [];
		$this->purposes = ($purposes !== null) ? ((array) $purposes) : [];
		$this->requirement = ($requirement !== null) ? ((string) $requirement) : DataRequirement::ALWAYS;
		$this->dataElements = [];

		if (\is_callable($init)) {
			$init($this);
		}
	}

}
