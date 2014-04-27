<?php
namespace Nezaniel\Syndicator\Dto\Rss2;

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
 * An RSS enclosure
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltenclosuregtSubelementOfLtitemgt
 */
class Enclosure implements XmlWriterSerializableInterface {

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var integer
	 */
	protected $length;

	/**
	 * @var string
	 */
	protected $type;


	/**
	 * @param string $url
	 * @param integer $length
	 * @param string $type
	 */
	public function __construct($url, $length, $type) {
		$this->url = $url;
		$this->length = (integer) $length;
		$this->type = $type;
	}


	/**
	 * @return integer
	 */
	public function getLength() {
		return $this->length;
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
	public function getUrl() {
		return $this->url;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'enclosure') {
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('url', $this->getUrl());
		$feedWriter->writeAttribute('length', $this->getLength());
		$feedWriter->writeAttribute('type', $this->getType());

		$feedWriter->endElement();
	}

}