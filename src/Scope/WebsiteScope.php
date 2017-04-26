<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Scope;

use Delight\PrivacyPolicy\Markup\LinkMarkup;

/** Scope that describes a website */
final class WebsiteScope extends Scope {

	/** @var string the URL, e.g. `https://www.example.com/` */
	private $url;
	/** @var string the name, e.g. `My Website` */
	private $name;

	/**
	 * Returns the URL
	 *
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param string $url the URL of the website, e.g. `https://www.example.com/`
	 * @param string $name the name of the website, e.g. `My Website`
	 */
	public function __construct($url, $name) {
		$this->url = (string) $url;
		$this->name = (string) $name;
	}

	protected function toMarkup() {
		return new LinkMarkup($this->url, $this->name);
	}

}
