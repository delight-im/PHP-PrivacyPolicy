<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup;

/** Simple markup that is composed exclusively of other generic markup */
abstract class SimpleMarkup extends Markup {

	public function toHtmlWithIndentation($indentation) {
		return $this->toMarkup()->toHtmlWithIndentation($indentation);
	}

	public function toPlainTextWithIndentation($indentation) {
		return $this->toMarkup()->toPlainTextWithIndentation($indentation);
	}

	public function toMarkdownWithIndentation($indentation) {
		return $this->toMarkup()->toMarkdownWithIndentation($indentation);
	}

	/**
	 * Returns the generic markup of the instance
	 *
	 * @internal
	 *
	 * @return Markup
	 */
	abstract protected function toMarkup();

}
