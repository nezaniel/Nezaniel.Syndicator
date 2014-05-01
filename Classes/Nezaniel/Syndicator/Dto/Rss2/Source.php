<?php
namespace Nezaniel\Syndicator\Dto\Rss2;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Core\XmlWriterSerializableInterface;

/**
 * An RSS source
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltsourcegtSubelementOfLtitemgt
 */
class Source implements XmlWriterSerializableInterface {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $url;


	/**
	 * @param string $name
	 * @param string $url
	 */
	public function __construct($name, $url) {
		$this->name = $name;
		$this->url = $url;
	}


	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
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
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'source') {
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('url', $this->getUrl());
		$feedWriter->writeRaw($this->getName());

		$feedWriter->endElement();
	}

}