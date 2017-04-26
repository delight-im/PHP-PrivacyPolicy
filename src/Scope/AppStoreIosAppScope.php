<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Scope;

use Delight\PrivacyPolicy\Markup\LinkMarkup;

/** Scope that describes a mobile app for iOS available through Apple's App Store */
final class AppStoreIosAppScope extends IosAppScope {

	/**
	 * The format of URLs for iOS apps on the App Store
	 *
	 * @internal
	 *
	 * @var string
	 */
	const URL_FORMAT = 'https://itunes.apple.com/app/id%s';

	/** @var string the track ID, e.g. `54614917093` */
	private $trackId;
	/** @var string the name, e.g. `My iOS App` */
	private $name;

	/**
	 * Returns the track ID
	 *
	 * @return string
	 */
	public function getTrackId() {
		return $this->trackId;
	}

	/**
	 * @param string $trackId the track ID of the application, e.g. `54614917093`
	 * @param string $name the name of the application, e.g. `My iOS App`
	 */
	public function __construct($trackId, $name) {
		$this->trackId = (string) $trackId;
		$this->name = (string) $name;
	}

	protected function toMarkup() {
		$target = \sprintf(self::URL_FORMAT, $this->trackId);

		return new LinkMarkup($target, $this->name);
	}

}
