<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup;

/** Generic markup for hyperlinks */
final class LinkMarkup extends Markup {

	/** @var string the target URI of the instance */
	private $target;
	/** @var string the label of the instance */
	private $label;

	/**
	 * @param string $target the target URI
	 * @param string|null $label (optional) the label
	 */
	public function __construct($target, $label = null) {
		$this->target = (string) $target;

		if ($label === null) {
			$label = $target;
		}

		$this->label = (string) $label;
	}

	public function toHtmlWithIndentation($indentation) {
		$out = self::createHtmlIndentation($indentation);
		$out .= '<a href="';
		$out .= self::escapeForHtml($this->target);
		$out .= '">';
		$out .= "\n";
		$out .= self::createHtmlIndentation($indentation + 1);
		$out .= self::escapeForHtml($this->label);
		$out .= "\n";
		$out .= self::createHtmlIndentation($indentation);
		$out .= '</a>';

		return $out;
	}

	public function toPlainTextWithIndentation($indentation) {
		$out = self::createPlainTextIndentation($indentation);
		$out .= $this->label;

		if (\str_replace('mailto:', '', $this->target) !== $this->label) {
			$out .= ' (';
			$out .= $this->target;
			$out .= ')';
		}

		return $out;
	}

	public function toMarkdownWithIndentation($indentation) {
		$out = self::createMarkdownIndentation($indentation);
		$out .= '[';
		$out .= $this->label;
		$out .= '](';
		$out .= $this->target;
		$out .= ')';

		return $out;
	}

}
