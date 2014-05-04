<?php
namespace Nezaniel\Syndicator\Dto\Atom;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use TYPO3\Flow\Annotations as Flow;

/**
 * An Atom Content implementation
 *
 * @see http://www.atomenabled.org/developers/syndication/#contentElement
 */
class Content extends Text implements ContentInterface{

	/**
	 * @var string
	 */
	protected $src = '';

	/**
	 * @var string
	 */
	protected $tagName = 'content';


	/**
	 * @param string $type
	 * @param string $content
	 * @param string $src
	 */
	public function __construct($type, $content, $src = '') {
		parent::__construct($type, $content);
		$this->src = $src;
	}


	/**
	 * @return string
	 */
	public function getSrc() {
		return $this->src;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeAttribute('type', $this->getType());
		if ($this->getSrc() !== '')
			$feedWriter->writeAttribute('src', $this->getSrc());
		$feedWriter->writeRaw($this->getContent());

		$feedWriter->endElement();
	}

}