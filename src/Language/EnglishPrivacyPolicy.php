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

	protected function formatDate($unixTimestamp) {
		return \IntlDateFormatter::create('en_US', \IntlDateFormatter::LONG, \IntlDateFormatter::NONE)->format($unixTimestamp);
	}

	protected function formatHours($n) {
		return \sprintf(($n === 1 ? '%d hour' : '%d hours'), $n);
	}

	protected function formatDays($n) {
		return \sprintf(($n === 1 ? '%d day' : '%d days'), $n);
	}

	protected function formatWeeks($n) {
		return \sprintf(($n === 1 ? '%d week' : '%d weeks'), $n);
	}

	protected function formatMonths($n) {
		return \sprintf(($n === 1 ? '%d month' : '%d months'), $n);
	}

	protected function formatYears($n) {
		return \sprintf(($n === 1 ? '%d year' : '%d years'), $n);
	}

}
