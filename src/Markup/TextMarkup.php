<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup;

/** Generic markup for text */
final class TextMarkup extends Markup {

	/** @var string the text of the instance */
	private $text;

	/** @param string $text */
	public function __construct($text) {
		$this->text = (string) $text;
	}

	public function toHtmlWithIndentation($indentation) {
		$out = self::createHtmlIndentation($indentation);
		$out .= self::escapeForHtml($this->text);

		return $out;
	}

	public function toPlainTextWithIndentation($indentation) {
		$out = self::createPlainTextIndentation($indentation);
		$out .= $this->text;

		return $out;
	}

	public function toMarkdownWithIndentation($indentation) {
		$out = self::createMarkdownIndentation($indentation);
		$out .= $this->text;

		return $out;
	}

	public function __toString() {
		return $this->text;
	}

}
