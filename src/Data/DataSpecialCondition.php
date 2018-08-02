<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Data;

use Delight\PrivacyPolicy\Throwable\UnexpectedDataSpecialConditionError;

/** Conditions for the processing of special categories of personal data */
final class DataSpecialCondition {

	/** @var string the special condition of archiving or research */
	const ARCHIVING_OR_RESEARCH = 'archivingOrResearch';
	/** @var string the special condition of employment and social security */
	const EMPLOYMENT_AND_SOCIAL_SECURITY = 'employmentAndSocialSecurity';
	/** @var string the special condition of explicit consent */
	const EXPLICIT_CONSENT = 'explicitConsent';
	/** @var string the special condition of a foundation, association or non-profit */
	const FOUNDATION_ASSOCIATION_OR_NON_PROFIT = 'foundationAssociationOrNonProfit';
	/** @var string the special condition of health and social care */
	const HEALTH_AND_SOCIAL_CARE = 'healthAndSocialCare';
	/** @var string the special condition of legal claims or judicial capacity */
	const LEGAL_CLAIMS_OR_JUDICIAL_CAPACITY = 'legalClaimsOrJudicialCapacity';
	/** @var string the special condition of public data */
	const PUBLIC_DATA = 'publicData';
	/** @var string the special condition of public health */
	const PUBLIC_HEALTH = 'publicHealth';
	/** @var string the special condition of substantial public interest */
	const SUBSTANTIAL_PUBLIC_INTEREST = 'substantialPublicInterest';
	/** @var string the special condition of vital interests */
	const VITAL_INTERESTS = 'vitalInterests';

	/**
	 * Converts an identifier to a human-readable description in natural language
	 *
	 * @param string $identifier one of the constants from this class
	 * @return string the description in natural language
	 * @throws UnexpectedDataSpecialConditionError
	 */
	public static function toNaturalLanguage($identifier) {
		switch ($identifier) {
			case self::ARCHIVING_OR_RESEARCH:
				return 'archiving or research';
			case self::EMPLOYMENT_AND_SOCIAL_SECURITY:
				return 'employment and social security';
			case self::EXPLICIT_CONSENT:
				return 'explicit consent';
			case self::FOUNDATION_ASSOCIATION_OR_NON_PROFIT:
				return 'foundation, association or non-profit';
			case self::HEALTH_AND_SOCIAL_CARE:
				return 'health and social care';
			case self::LEGAL_CLAIMS_OR_JUDICIAL_CAPACITY:
				return 'legal claims or judicial capacity';
			case self::PUBLIC_DATA:
				return 'public data';
			case self::PUBLIC_HEALTH:
				return 'public health';
			case self::SUBSTANTIAL_PUBLIC_INTEREST:
				return 'substantial public interest';
			case self::VITAL_INTERESTS:
				return 'vital interests';
			default:
				throw new UnexpectedDataSpecialConditionError($identifier);
		}
	}

	/**
	 * Converts an identifier to a legal reference in natural language
	 *
	 * @param string $identifier one of the constants from this class
	 * @return string the legal reference in natural language
	 * @throws UnexpectedDataSpecialConditionError
	 */
	public static function toLegalReference($identifier) {
		switch ($identifier) {
			case self::ARCHIVING_OR_RESEARCH:
				return 'Processing is necessary for archiving purposes in the public interest, scientific or historical research purposes or statistical purposes (EU, General Data Protection Regulation (GDPR), Article 9(2)(j)).';
			case self::EMPLOYMENT_AND_SOCIAL_SECURITY:
				return 'Processing is necessary for the purposes of carrying out obligations and exercising specific rights in the field of employment and social security and social protection law (EU, General Data Protection Regulation (GDPR), Article 9(2)(b)).';
			case self::EXPLICIT_CONSENT:
				return 'You have given explicit consent to the processing of your personal data for one or more specified purposes (EU, General Data Protection Regulation (GDPR), Article 9(2)(a)).';
			case self::FOUNDATION_ASSOCIATION_OR_NON_PROFIT:
				return 'Processing is carried out by a foundation, association or any other not-for-profit body with a political, philosophical, religious or trade union aim and on condition that the processing relates solely to the members or to former members of the body or to persons who have regular contact with it (EU, General Data Protection Regulation (GDPR), Article 9(2)(d)).';
			case self::HEALTH_AND_SOCIAL_CARE:
				return 'Processing is necessary for the purposes of preventive or occupational medicine, for the assessment of the working capacity of the employee, medical diagnosis, the provision of health or social care or treatment or the management of health or social care systems and services (EU, General Data Protection Regulation (GDPR), Article 9(2)(h)).';
			case self::LEGAL_CLAIMS_OR_JUDICIAL_CAPACITY:
				return 'Processing is necessary for the establishment, exercise or defence of legal claims or for a court acting in its judicial capacity (EU, General Data Protection Regulation (GDPR), Article 9(2)(f)).';
			case self::PUBLIC_DATA:
				return 'Processing relates to personal data that you manifestly make public (EU, General Data Protection Regulation (GDPR), Article 9(2)(e)).';
			case self::PUBLIC_HEALTH:
				return 'Processing is necessary for reasons of public interest in the area of public health, such as protecting against serious cross-border threats to health or ensuring high standards of quality and safety of health care and of medicinal products or medical devices (EU, General Data Protection Regulation (GDPR), Article 9(2)(i)).';
			case self::SUBSTANTIAL_PUBLIC_INTEREST:
				return 'Processing is necessary for reasons of substantial public interest (EU, General Data Protection Regulation (GDPR), Article 9(2)(g)).';
			case self::VITAL_INTERESTS:
				return 'Processing is necessary to protect your vital interests or those of another natural person where you are physically or legally incapable of giving consent (EU, General Data Protection Regulation (GDPR), Article 9(2)(c)).';
			default:
				throw new UnexpectedDataSpecialConditionError($identifier);
		}
	}

}
