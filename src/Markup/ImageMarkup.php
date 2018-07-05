<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup;

/** Generic markup for images */
final class ImageMarkup extends Markup {

	/** @var string the URL of the image to display */
	private $source;
	/** @var string|null the alternative text to show if the image cannot be displayed */
	private $alternativeText;
	/** @var int|null the suggested width of the image in pixels */
	private $width;
	/** @var int|null the suggested height of the image in pixels */
	private $height;

	/**
	 * @param string $source the URL of the image to display
	 * @param string|null $alternativeText (optional) the alternative text to show if the image cannot be displayed
	 * @param int|null $width (optional) the suggested width of the image in pixels
	 * @param int|null $height (optional) the suggested height of the image in pixels
	 */
	public function __construct($source, $alternativeText = null, $width = null, $height = null) {
		$this->source = (string) $source;
		$this->alternativeText = ($alternativeText !== null) ? ((string) $alternativeText) : null;
		$this->width = ($width !== null) ? ((int) $width) : null;
		$this->height = ($height !== null) ? ((int) $height) : null;
	}

	public function toHtmlWithIndentation($indentation) {
		$out = self::createHtmlIndentation($indentation);

		$out .= '<img';
		$out .= ' src="';
		$out .= self::escapeForHtml($this->source);
		$out .= '"';

		if ($this->alternativeText !== null) {
			$out .= ' alt="';
			$out .= self::escapeForHtml($this->alternativeText);
			$out .= '"';
		}

		if ($this->width !== null) {
			$out .= ' width="';
			$out .= self::escapeForHtml($this->width);
			$out .= '"';
		}

		if ($this->height !== null) {
			$out .= ' height="';
			$out .= self::escapeForHtml($this->height);
			$out .= '"';
		}

		$out .= '>';

		return $out;
	}

	public function toPlainTextWithIndentation($indentation) {
		$out = self::createPlainTextIndentation($indentation);

		$out .= $this->source;

		if ($this->alternativeText !== null) {
			$out .= ' (';
			$out .= $this->alternativeText;
			$out .= ')';
		}

		return $out;
	}

	public function toMarkdownWithIndentation($indentation) {
		$out = self::createMarkdownIndentation($indentation);

		$out .= '![';

		if ($this->alternativeText !== null) {
			$out .= $this->alternativeText;
		}

		$out .= '](';
		$out .= $this->source;
		$out .= ')';

		return $out;
	}

}
