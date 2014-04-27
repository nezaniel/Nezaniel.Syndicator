<?php
namespace Nezaniel\Syndicator\Dto\Atom;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Nezaniel.Feeder".       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */
use Nezaniel\Syndicator\Core\XmlWriterSerializableInterface;
use TYPO3\Flow\Annotations as Flow;

/**
 * An Atom text construct
 *
 * @see http://www.atomenabled.org/developers/syndication/#text
 */
class Text implements XmlWriterSerializableInterface {

	const TYPE_TEXT = 'text';
	const TYPE_HTML = 'html';
	const TYPE_XHTML = 'xhtml';


	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $content;


	/**
	 * @param string $type
	 * @param string $content
	 */
	public function __construct($type, $content) {
		$this->type = $type;
		$this->content = $content;
	}


	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @return string
	 */
	public function getContent() {
		return $this->content;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName) {
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('type', $this->getType());
		$feedWriter->writeRaw($this->getContent());

		$feedWriter->endElement();
	}

}