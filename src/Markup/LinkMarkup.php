<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup;

/** Generic markup for hyperlinks */
final class LinkMarkup extends Markup {

	/** @var string the target URI */
	private $target;
	/** @var Markup the label */
	private $label;

	/**
	 * @param string $target the target URI
	 * @param string|Markup|null $label (optional) the label
	 */
	public function __construct($target, $label = null) {
		$this->target = (string) $target;

		if ($label === null) {
			$label = $target;
		}

		if (!($label instanceof Markup)) {
			$label = new TextMarkup((string) $label);
		}

		$this->label = $label;
	}

	public function toHtmlWithIndentation($indentation) {
		$out = self::createHtmlIndentation($indentation);
		$out .= '<a href="';
		$out .= self::escapeForHtml($this->target);
		$out .= '">';
		$out .= "\n";

		if ($this->label !== null) {
			$out .= $this->label->toHtmlWithIndentation($indentation + 1);
		}

		$out .= "\n";
		$out .= self::createHtmlIndentation($indentation);
		$out .= '</a>';

		return $out;
	}

	public function toPlainTextWithIndentation($indentation) {
		$out = self::createPlainTextIndentation($indentation);

		if ($this->label !== null) {
			$out .= $this->label->toPlainTextWithIndentation(0);
			$out .= Markup::SPACE;
		}

		$out .= '(';
		$out .= $this->target;
		$out .= ')';

		return $out;
	}

	public function toMarkdownWithIndentation($indentation) {
		$out = self::createMarkdownIndentation($indentation);
		$out .= '[';

		if ($this->label !== null) {
			$out .= $this->label->toMarkdownWithIndentation(0);
		}

		$out .= '](';
		$out .= $this->target;
		$out .= ')';

		return $out;
	}

}
