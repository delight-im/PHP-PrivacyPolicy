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
	/** @var string|null an extended description */
	private $description;

	/**
	 * @param string $target the target URI
	 * @param string|Markup|null $label (optional) the label
	 * @param string|null $description (optional) an extended description
	 */
	public function __construct($target, $label = null, $description = null) {
		$this->target = (string) $target;

		if ($label === null) {
			$label = $target;
		}

		if (!($label instanceof Markup)) {
			$label = new TextMarkup((string) $label);
		}

		$this->label = $label;
		$this->description = ($description !== null) ? ((string) $description) : null;
	}

	public function toHtmlWithIndentation($indentation) {
		$out = self::createHtmlIndentation($indentation);

		$out .= '<a';
		$out .= ' href="';
		$out .= self::escapeForHtml($this->target);
		$out .= '"';

		if ($this->description !== null) {
			$out .= ' title="';
			$out .= self::escapeForHtml($this->description);
			$out .= '"';
		}

		$out .= '>';
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

		if ($this->description !== null) {
			$out .= Markup::EN_DASH;
			$out .= Markup::SPACE;
			$out .= $this->description;
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

			if ($this->description !== null) {
				$out .= Markup::SPACE;
				$out .= Markup::EN_DASH;
				$out .= Markup::SPACE;
				$out .= $this->description;
			}
		}

		$out .= '](';
		$out .= $this->target;
		$out .= ')';

		return $out;
	}

}
