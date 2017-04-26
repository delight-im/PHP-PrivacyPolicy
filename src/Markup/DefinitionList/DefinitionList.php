<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup\DefinitionList;

use Delight\PrivacyPolicy\Markup\Markup;

/** Generic markup for a definition list */
final class DefinitionList extends Markup {

	/** @var DefinitionGroup[] the individual definition groups */
	private $definitionGroups;

	/**
	 * Adds a new definition group
	 *
	 * The group has one term to be defined and any number of definitions for the term
	 *
	 * @param string|Markup $term the term to be defined
	 * @param callable|null $init (optional) a callback that receives the new instance and may initialize it
	 */
	public function addDefinitionGroup($term, callable $init = null) {
		$this->definitionGroups[] = new DefinitionGroup($term, $init);
	}

	public function toHtmlWithIndentation($indentation) {
		$out = self::createHtmlIndentation($indentation);
		$out .= '<dl>';
		$out .= "\n";

		foreach ($this->definitionGroups as $definitionGroup) {
			$out .= $definitionGroup->toHtmlWithIndentation($indentation + 1);
			$out .= "\n";
		}

		$out .= self::createHtmlIndentation($indentation);
		$out .= '</dl>';

		return $out;
	}

	public function toPlainTextWithIndentation($indentation) {
		$out = '';

		foreach ($this->definitionGroups as $definitionGroup) {
			if ($out !== '') {
				$out .= "\n";
			}

			$out .= $definitionGroup->toPlainTextWithIndentation($indentation);
		}

		return $out;
	}

	public function toMarkdownWithIndentation($indentation) {
		$out = '';

		foreach ($this->definitionGroups as $definitionGroup) {
			if ($out !== '') {
				$out .= "\n";
			}

			$out .= $definitionGroup->toMarkdownWithIndentation($indentation);
		}

		return $out;
	}

	/**
	 * Creates a new definition list
	 *
	 * The list can have any number of definition groups
	 *
	 * @param callable|null $init (optional) a callback that receives the new instance and may initialize it
	 */
	public function __construct(callable $init = null) {
		$this->definitionGroups = [];

		if (\is_callable($init)) {
			$init($this);
		}
	}

}
