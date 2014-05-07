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
 * An RSS source
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltsourcegtSubelementOfLtitemgt
 */
class Source extends AbstractXmlWriterSerializable implements SourceInterface {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var string
	 */
	protected $tagName = 'source';


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
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeAttribute('url', $this->getUrl());
		$feedWriter->writeRaw($this->getName());

		$feedWriter->endElement();
	}

}