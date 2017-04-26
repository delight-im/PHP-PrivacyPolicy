<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Language;

use Delight\PrivacyPolicy\HumanPrivacyPolicy;

/** Privacy policy for humans in English */
class EnglishPrivacyPolicy extends HumanPrivacyPolicy {

	public function getShortTitle() {
		return 'Privacy';
	}

	public function getLongTitle() {
		return 'Privacy Policy';
	}

	protected function translateUnformatted($text) {
		return $text;
	}

	protected function getDateFormat() {
		return 'F d, Y';
	}

}
