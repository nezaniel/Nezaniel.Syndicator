<?php
namespace Nezaniel\Syndicator\Dto;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Core\XmlSerializableInterface;

/**
 * An abstract feed
 */
abstract class AbstractXmlSerializableFeed implements XmlSerializableInterface {

	/**
	 * @return string
	 */
	public function xmlSerialize() {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(TRUE);
		$feedWriter->startDocument('1.0', 'utf-8');

		$this->xmlSerializeInternal($feedWriter);

		$feedWriter->endDocument();
		return $feedWriter->outputMemory();
	}

	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	abstract public function xmlSerializeInternal(\XMLWriter $feedWriter);

}