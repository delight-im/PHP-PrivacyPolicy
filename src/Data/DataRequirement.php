<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Data;

use Delight\PrivacyPolicy\Throwable\UnexpectedDataRequirementError;

/** Specification of whether information is required and whether consent is needed */
final class DataRequirement {

	/**
	 * Specifies that a service cannot be used without the collection of certain information
	 *
	 * @var string
	 */
	const ALWAYS = 'always';

	/**
	 * Specifies that a service may be used without the collection of certain information
	 *
	 * The user must explicitly consent to the collection of the information in advance
	 *
	 * @var string
	 */
	const OPT_IN = 'optIn';

	/**
	 * Specifies that a service may be used without the collection of certain information
	 *
	 * The user may withdraw their consent to the collection of the information retroactively
	 *
	 * @var string
	 */
	const OPT_OUT = 'optOut';

	/**
	 * Converts an identifier to a boolean value indicating whether there is a requirement
	 *
	 * @param string $identifier one of the constants from this class
	 * @return bool
	 * @throws UnexpectedDataRequirementError
	 */
	public static function toBool($identifier) {
		switch ($identifier) {
			case self::ALWAYS:
				return true;
			case self::OPT_IN:
				return false;
			case self::OPT_OUT:
				return false;
			default:
				throw new UnexpectedDataRequirementError($identifier);
		}
	}

	/**
	 * Converts an identifier to a human-readable description in natural language
	 *
	 * @param string $identifier one of the constants from this class
	 * @return string the description in natural language
	 * @throws UnexpectedDataRequirementError
	 */
	public static function toNaturalLanguage($identifier) {
		switch ($identifier) {
			case self::ALWAYS:
				return 'This information is required for the operation of our services and its collection is therefore a condition for your use of our services.';
			case self::OPT_IN:
				return 'This information is not required and you can use parts of our services without this information. You have to give your consent before we collect this data, but some features may not be available without.';
			case self::OPT_OUT:
				return 'This information is not required and you can use parts of our services without this information. You may withdraw your consent for our collection of this data, but some features may not be available without.';
			default:
				throw new UnexpectedDataRequirementError($identifier);
		}
	}

}
