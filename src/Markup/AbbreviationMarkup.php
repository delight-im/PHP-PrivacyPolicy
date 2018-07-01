<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup;

/** Generic markup for abbreviations with an optional expansion */
final class AbbreviationMarkup extends Markup {

	/** @var string the abbreviation in its short form */
	private $abridgement;
	/** @var string|null the abbreviation in its long form */
	private $expansion;

	/**
	 * @param string $abridgement the abbreviation in its short form
	 * @param string|null $expansion (optional) the abbreviation in its long form
	 */
	public function __construct($abridgement, $expansion = null) {
		$this->abridgement = (string) $abridgement;
		$this->expansion = ($expansion !== null) ? ((string) $expansion) : null;
	}

	public function toHtmlWithIndentation($indentation) {
		$out = self::createHtmlIndentation($indentation);

		$out .= '<abbr';

		if ($this->expansion !== null) {
			$out .= ' title="';
			$out .= self::escapeForHtml($this->expansion);
			$out .= '"';
		}

		$out .= '>';
		$out .= "\n";
		$out .= self::createHtmlIndentation($indentation + 1);
		$out .= self::escapeForHtml($this->abridgement);
		$out .= "\n";
		$out .= self::createHtmlIndentation($indentation);
		$out .= '</abbr>';

		return $out;
	}

	public function toPlainTextWithIndentation($indentation) {
		$out = self::createPlainTextIndentation($indentation);

		$out .= $this->abridgement;

		if ($this->expansion !== null) {
			$out .= ' (';
			$out .= $this->expansion;
			$out .= ')';
		}

		return $out;
	}

	public function toMarkdownWithIndentation($indentation) {
		$out = self::createMarkdownIndentation($indentation);

		$out .= $this->abridgement;

		if ($this->expansion !== null) {
			$out .= ' (';
			$out .= $this->expansion;
			$out .= ')';
		}

		return $out;
	}

}
