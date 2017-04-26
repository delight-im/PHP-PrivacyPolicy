<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Scope;

use Delight\PrivacyPolicy\Markup\LinkMarkup;

/** Scope that describes a mobile app for Android available through Google's Play Store */
final class PlayStoreAndroidAppScope extends AndroidAppScope {

	/**
	 * The format of URLs for Android apps on the Play Store
	 *
	 * @internal
	 *
	 * @var string
	 */
	const URL_FORMAT = 'https://play.google.com/store/apps/details?id=%s';

	/** @var string the package name, e.g. `com.example.app` */
	private $packageName;
	/** @var string the name, e.g. `My Android App` */
	private $name;

	/**
	 * Returns the package name
	 *
	 * @return string
	 */
	public function getPackageName() {
		return $this->packageName;
	}

	/**
	 * @param string $packageName the package name of the application, e.g. `com.example.app`
	 * @param string $name the name of the application, e.g. `My Android App`
	 */
	public function __construct($packageName, $name) {
		$this->packageName = (string) $packageName;
		$this->name = (string) $name;
	}

	protected function toMarkup() {
		$target = \sprintf(self::URL_FORMAT, $this->packageName);

		return new LinkMarkup($target, $this->name);
	}

}
