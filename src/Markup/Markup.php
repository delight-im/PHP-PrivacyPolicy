<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup;

/** Generic markup that can be converted to various specific formats */
abstract class Markup {

	/**
	 * The sequence of characters that is used for a single level of indentation in HTML
	 *
	 * @internal
	 *
	 * @var string
	 */
	const INDENTATION_UNIT_HTML = "\t";

	/**
	 * The sequence of characters that is used for a single level of indentation in plain text
	 *
	 * @internal
	 *
	 * @var string
	 */
	const INDENTATION_UNIT_PLAIN_TEXT = "\t";

	/**
	 * The sequence of characters that is used for a single level of indentation in Markdown
	 *
	 * @internal
	 *
	 * @var string
	 */
	const INDENTATION_UNIT_MARKDOWN = '  ';

	/**
	 * The default charset or character encoding
	 *
	 * @internal
	 *
	 * @var mixed
	 */
	const CHARSET_DEFAULT = 'UTF-8';

	/**
	 * A single space character
	 *
	 * @var string
	 */
	const SPACE = ' ';

	/**
	 * A single en dash character
	 *
	 * @var string
	 */
	const EN_DASH = '–';

	/**
	 * A single middle dot character
	 *
	 * @var string
	 */
	const MIDDLE_DOT = '·';

	/**
	 * Converts the markup to HTML
	 *
	 * @param int|null $indentation (optional) the level of indentation
	 * @return string
	 */
	public function toHtml($indentation = null) {
		return $this->toHtmlWithIndentation($indentation !== null ? $indentation : 0);
	}

	/**
	 * Converts the markup to HTML
	 *
	 * @internal
	 *
	 * @param int $indentation the level of indentation
	 * @return string
	 */
	abstract public function toHtmlWithIndentation($indentation);

	/**
	 * Converts the markup to plain text
	 *
	 * @param int|null $indentation (optional) the level of indentation
	 * @return string
	 */
	public function toPlainText($indentation = null) {
		return $this->toPlainTextWithIndentation($indentation !== null ? $indentation : 0);
	}

	/**
	 * Converts the markup to plain text
	 *
	 * @internal
	 *
	 * @param int $indentation the level of indentation
	 * @return string
	 */
	abstract public function toPlainTextWithIndentation($indentation);

	/**
	 * Converts the markup to Markdown
	 *
	 * @param int|null $indentation (optional) the level of indentation
	 * @return string
	 */
	public function toMarkdown($indentation = null) {
		return $this->toMarkdownWithIndentation($indentation !== null ? $indentation : 0);
	}

	/**
	 * Converts the markup to Markdown
	 *
	 * @internal
	 *
	 * @param int $indentation the level of indentation
	 * @return string
	 */
	abstract public function toMarkdownWithIndentation($indentation);

	/**
	 * Creates the HTML sequence used for indentation of the specified level
	 *
	 * @param int $indentation the level of indentation
	 * @return string
	 */
	protected static function createHtmlIndentation($indentation) {
		return \str_repeat(self::INDENTATION_UNIT_HTML, $indentation);
	}

	/**
	 * Creates the plain text sequence used for indentation of the specified level
	 *
	 * @param int $indentation the level of indentation
	 * @return string
	 */
	protected static function createPlainTextIndentation($indentation) {
		return \str_repeat(self::INDENTATION_UNIT_PLAIN_TEXT, $indentation);
	}

	/**
	 * Creates the Markdown sequence used for indentation of the specified level
	 *
	 * @param int $indentation the level of indentation
	 * @return string
	 */
	protected static function createMarkdownIndentation($indentation) {
		return \str_repeat(self::INDENTATION_UNIT_MARKDOWN, $indentation);
	}

	/**
	 * Escapes the supplied text for use in HTML
	 *
	 * @param string $text
	 * @return string
	 */
	protected static function escapeForHtml($text) {
		return \htmlspecialchars($text, \ENT_QUOTES, self::CHARSET_DEFAULT);
	}

}
