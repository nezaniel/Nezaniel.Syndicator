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
 * An RSS category
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltcategorygtSubelementOfLtitemgt
 */
class Category implements XmlWriterSerializableInterface {

	/**
	 * @var string
	 */
	protected $name = '';

	/**
	 * @var string
	 */
	protected $domain = '';


	/**
	 * @param string $name
	 * @param string $domain
	 */
	public function __construct($name, $domain = '') {
		$this->name = $name;
		$this->domain = $domain;
	}


	/**
	 * @return string
	 */
	public function getDomain() {
		return $this->domain;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'category') {
		$feedWriter->startElement($tagName);

		if ($this->getDomain() !== '') {
			$feedWriter->writeAttribute('domain', $this->getDomain());
		}
		$feedWriter->writeRaw($this->getName());

		$feedWriter->endElement();
	}

}