<?php
namespace Nezaniel\Syndicator\Core;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */

/**
 * An abstract class for XML serialization using \XMLWriter
 *
 * @see http://php.net/manual/de/book.xmlwriter.php
 */
abstract class AbstractXmlWriterSerializable implements XmlSerializableInterface {

	/**
	 * @var string
	 */
	protected $tagName;


	/**
	 * @return string
	 */
	public function getTagName() {
		return $this->tagName;
	}

	/**
	 * @param string $tagName
	 */
	public function setTagName($tagName) {
		$this->tagName = $tagName;
	}


	/**
	 * @return string
	 */
	public function xmlSerialize() {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$this->xmlSerializeInternal($feedWriter);
		return $feedWriter->outputMemory();
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return string
	 */
	abstract protected function xmlSerializeInternal(\XMLWriter $feedWriter);

}