<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup;

/** Generic markup for a concatenation of other elements */
final class ConcatenationMarkup extends Markup {

	/** @var Markup[] the elements to concatenate */
	private $elements;

	/**
	 * @param ...Markup $elements the elements to concatenate
	 */
	public function __construct(...$elements) {
		$this->elements = $elements;
	}

	public function toHtmlWithIndentation($indentation) {
		$out = [];

		foreach ($this->elements as $element) {
			$out[] = $element->toHtmlWithIndentation($indentation);
		}

		return \implode("\n", $out);
	}

	public function toPlainTextWithIndentation($indentation) {
		$out = [];

		foreach ($this->elements as $element) {
			$out[] = $element->toPlainTextWithIndentation(0);
		}

		return self::createPlainTextIndentation($indentation) . \implode(Markup::SPACE, $out);
	}

	public function toMarkdownWithIndentation($indentation) {
		$out = [];

		foreach ($this->elements as $element) {
			$out[] = $element->toMarkdownWithIndentation(0);
		}

		return self::createMarkdownIndentation($indentation) . \implode(Markup::SPACE, $out);
	}

}
