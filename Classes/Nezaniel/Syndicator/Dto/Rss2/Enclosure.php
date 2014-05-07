<?php
namespace Nezaniel\Syndicator\Dto\Rss2;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Core\AbstractXmlWriterSerializable;

/**
 * An RSS enclosure
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltenclosuregtSubelementOfLtitemgt
 */
class Enclosure extends AbstractXmlWriterSerializable implements EnclosureInterface {

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
	 * @var string
	 */
	protected $tagName = 'enclosure';


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
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeAttribute('url', $this->getUrl());
		$feedWriter->writeAttribute('length', $this->getLength());
		$feedWriter->writeAttribute('type', $this->getType());

		$feedWriter->endElement();
	}

}