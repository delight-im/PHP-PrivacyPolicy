<?php

/*
 * PHP-PrivacyPolicy (https://github.com/delight-im/PHP-PrivacyPolicy)
 * Copyright (c) delight.im (https://www.delight.im/)
 * Licensed under the MIT License (https://opensource.org/licenses/MIT)
 */

namespace Delight\PrivacyPolicy\Markup\DefinitionList;

use Delight\PrivacyPolicy\Markup\Markup;
use Delight\PrivacyPolicy\Markup\TextMarkup;

/** Generic markup for a term and its definitions within a definition list */
final class DefinitionGroup extends Markup {

	/** @var Markup the term */
	private $term;
	/** @var Markup[] the list of definitions */
	private $definitions;

	/**
	 * Adds a new definition for the term of the group
	 *
	 * @param string|Markup $definition
	 */
	public function addDefinition($definition) {
		if (!($definition instanceof Markup)) {
			$definition = new TextMarkup((string) $definition);
		}

		$this->definitions[] = $definition;
	}

	/**
	 * Adds a new definition for the term of the group by executing the specified callback
	 *
	 * The callback must return a definition
	 *
	 * @param callable $build
	 */
	public function addDefinitionInteractively(callable $build) {
		$this->addDefinition($build());
	}

	public function toHtmlWithIndentation($indentation) {
		$out = self::createHtmlIndentation($indentation);
		$out .= '<dt>';
		$out .= "\n";
		$out .= self::createHtmlIndentation($indentation + 1);
		$out .= '<strong>';
		$out .= "\n";
		$out .= $this->term->toHtmlWithIndentation($indentation + 2);
		$out .= "\n";
		$out .= self::createHtmlIndentation($indentation + 1);
		$out .= '</strong>';
		$out .= "\n";
		$out .= self::createHtmlIndentation($indentation);
		$out .= '</dt>';

		if (!empty($this->definitions)) {
			foreach ($this->definitions as $definition) {
				$out .= "\n";
				$out .= self::createHtmlIndentation($indentation);
				$out .= '<dd>';
				$out .= "\n";
				$out .= $definition->toHtmlWithIndentation($indentation + 1);
				$out .= "\n";
				$out .= self::createHtmlIndentation($indentation);
				$out .= '</dd>';
			}
		}
		else {
			$out .= "\n";
			$out .= self::createHtmlIndentation($indentation);
			$out .= '<dd></dd>';
		}

		return $out;
	}

	public function toPlainTextWithIndentation($indentation) {
		$out = $this->term->toPlainTextWithIndentation($indentation);

		foreach ($this->definitions as $definition) {
			$out .= "\n";
			$out .= $definition->toPlainTextWithIndentation($indentation + 1);
		}

		return $out;
	}

	public function toMarkdownWithIndentation($indentation) {
		$out = self::createMarkdownIndentation($indentation);
		$out .= ' * **';
		$out .= $this->term->toMarkdownWithIndentation(0);
		$out .= '**';

		foreach ($this->definitions as $definition) {
			$out .= "\n";

			if ($definition instanceof DefinitionList) {
				$out .= $definition->toMarkdownWithIndentation($indentation + 1);
			}
			else {
				$out .= self::createMarkdownIndentation($indentation + 1);
				$out .= ' * ';
				$out .= $definition->toMarkdownWithIndentation(0);
			}
		}

		return $out;
	}

	/**
	 * Creates a new group within a definition list
	 *
	 * The group has one term to be defined and any number of definitions for the term
	 *
	 * @param string|Markup $term the term to be defined
	 * @param callable|null $init (optional) a callback that receives the new instance and may initialize it
	 */
	public function __construct($term, callable $init = null) {
		if (!($term instanceof Markup)) {
			$term = new TextMarkup((string) $term);
		}

		$this->term = $term;
		$this->definitions = [];

		if (\is_callable($init)) {
			$init($this);
		}
	}

}
