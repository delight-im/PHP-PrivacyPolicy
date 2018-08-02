<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Data;

use Delight\PrivacyPolicy\Throwable\UnexpectedDataBasisError;

/** Lawful bases for data processing */
final class DataBasis {

	/** @var string the lawful basis of consent */
	const CONSENT = 'consent';
	/** @var string the lawful basis of a contract */
	const CONTRACT = 'contract';
	/** @var string the lawful basis of a legal obligation */
	const LEGAL_OBLIGATION = 'legalObligation';
	/** @var string the lawful basis of legitimate interests */
	const LEGITIMATE_INTERESTS = 'legitimateInterests';
	/** @var string the lawful basis of public interest */
	const PUBLIC_INTEREST = 'publicInterest';
	/** @var string the lawful basis of vital interests */
	const VITAL_INTERESTS = 'vitalInterests';

	/**
	 * Converts an identifier to a human-readable description in natural language
	 *
	 * @param string $identifier one of the constants from this class
	 * @return string the description in natural language
	 * @throws UnexpectedDataBasisError
	 */
	public static function toNaturalLanguage($identifier) {
		switch ($identifier) {
			case self::CONSENT:
				return 'consent';
			case self::CONTRACT:
				return 'contract';
			case self::LEGAL_OBLIGATION:
				return 'legal obligation';
			case self::LEGITIMATE_INTERESTS:
				return 'legitimate interests';
			case self::PUBLIC_INTEREST:
				return 'public interest';
			case self::VITAL_INTERESTS:
				return 'vital interests';
			default:
				throw new UnexpectedDataBasisError($identifier);
		}
	}

	/**
	 * Converts an identifier to a legal reference in natural language
	 *
	 * @param string $identifier one of the constants from this class
	 * @return string the legal reference in natural language
	 * @throws UnexpectedDataBasisError
	 */
	public static function toLegalReference($identifier) {
		switch ($identifier) {
			case self::CONSENT:
				return 'You have given consent to the processing of your personal data for one or more specific purposes (EU, General Data Protection Regulation (GDPR), Article 6(1)(a)).';
			case self::CONTRACT:
				return 'Processing is necessary for the performance of a contract to which you are party or in order to take steps at your request prior to entering into a contract (EU, General Data Protection Regulation (GDPR), Article 6(1)(b)).';
			case self::LEGAL_OBLIGATION:
				return 'Processing is necessary for compliance with a legal obligation to which we are subject (EU, General Data Protection Regulation (GDPR), Article 6(1)(c)).';
			case self::LEGITIMATE_INTERESTS:
				return 'Processing is necessary for the purposes of legitimate interests pursued by us or by a third party (EU, General Data Protection Regulation (GDPR), Article 6(1)(f)).';
			case self::PUBLIC_INTEREST:
				return 'Processing is necessary for the performance of a task carried out in the public interest or in the exercise of official authority vested in us (EU, General Data Protection Regulation (GDPR), Article 6(1)(e)).';
			case self::VITAL_INTERESTS:
				return 'Processing is necessary in order to protect your vital interests or those of another natural person (EU, General Data Protection Regulation (GDPR), Article 6(1)(d)).';
			default:
				throw new UnexpectedDataBasisError($identifier);
		}
	}

}
