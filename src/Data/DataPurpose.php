<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Data;

use Delight\PrivacyPolicy\Throwable\UnexpectedDataPurposeError;

/** Purposes of data collection */
final class DataPurpose {

	/**
	 * Information is collected for the technical administration, maintenance and support of the provided
	 * services and the overall information system
	 *
	 * Communication with the user via external channels outside of the provided services (e.g. via
	 * email, text message or phone call) is only covered if such communication is essential for the
	 * administration and security of the service
	 *
	 * Examples: authentication, logging, password reset email, two-factor authentication
	 *
	 * @var string
	 */
	const ADMINISTRATION = 'administration';

	/**
	 * Information is collected to provide or enhance advertising that is displayed, rendered, played
	 * back or otherwise conveyed within the services
	 *
	 * Examples: Google AdSense, Facebook Ads, AdMob
	 *
	 * @var string
	 */
	const ADVERTISING = 'advertising';

	/**
	 * Information is collected for the provision of customer service via direct replies to inquiries or
	 * questions by the user or via transactional information given to the user in connection with a
	 * specific order, request or other activity
	 *
	 * Examples: Contact form, order confirmation, email response
	 *
	 * @var string
	 */
	const CUSTOMER_SUPPORT = 'customer_support';

	/**
	 * Information is collected for the fulfillment and support of the tasks or activities explicitly
	 * requested by the user, which may either be one-time procedures, recurring tasks or ongoing activities
	 *
	 * The user should have been informed in a clear and concise way about the nature and duration of the task
	 *
	 * Once the task has been completed, the data should be deleted by the service provider, unless other
	 * purposes have been claimed and explained to the user as such
	 *
	 * Examples: Shopping cart, order placement, product search, private messaging, public posts
	 *
	 * @var string
	 */
	const FULFILLMENT = 'fulfillment';

	/**
	 * Information is collected to contact users for marketing or promotional purposes
	 *
	 * Examples: newsletters, notifications about new features or site updates, information about related products
	 *
	 * @var string
	 */
	const MARKETING = 'marketing';

	/**
	 * Information is collected in order to personalize or tailor the content or the design of services
	 * to the (perceived) preferences of the user
	 *
	 * Personalization of advertising, especially when data is transmitted to third parties, is not covered
	 *
	 * Examples: selection of topics, related products, adjustments to user interface
	 *
	 * @var string
	 */
	const PERSONALIZATION = 'personalization';

	/**
	 * Information is collected for research and analysis aimed at making general improvements to the services
	 * for all users through evaluations and reviews based on average results or average usage statistics
	 *
	 * Tracking, targeting or profiling individual users is not covered and should be regarded as marketing
	 * or personalization instead, whichever applies
	 *
	 * Examples: A/B testing, heat maps, traffic sources, analysis of demographics, bounce rates
	 *
	 * @var string
	 */
	const RESEARCH = 'research';

	/**
	 * Converts an identifier to a human-readable description in natural language
	 *
	 * @param string $identifier one of the constants from this class
	 * @return string the description in natural language
	 * @throws UnexpectedDataPurposeError
	 */
	public static function toNaturalLanguage($identifier) {
		switch ($identifier) {
			case self::ADMINISTRATION:
				return 'We use this information for the provision, maintenance and administration of our services and to monitor and protect the security of our services.';
			case self::ADVERTISING:
				return 'We use this information to provide meaningful and unobtrusive advertising to you.';
			case self::CUSTOMER_SUPPORT:
				return 'We use this information to provide customer service to you, to answer your questions and to communicate with you about your use of our services.';
			case self::FULFILLMENT:
				return 'We use this information to provide and fulfill the specific services that you explicitly request.';
			case self::MARKETING:
				return 'We use this information for marketing and promotional purposes.';
			case self::PERSONALIZATION:
				return 'We use this information to personalize our services for you and to adjust them to your preferences.';
			case self::RESEARCH:
				return 'We use this information to improve our services through research and analysis and to better understand how our services are used.';
			default:
				throw new UnexpectedDataPurposeError($identifier);
		}
	}

}
