<?php
namespace Nezaniel\Syndicator\Dto\Atom;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Core\XmlWriterSerializableInterface;

/**
 * An Atom generator construct
 *
 * @see http://www.atomenabled.org/developers/syndication/#feed
 */
class Generator implements XmlWriterSerializableInterface {

	/**
	 * @var string
	 */
	protected $name = '';

	/**
	 * @var string
	 */
	protected $uri = '';

	/**
	 * @var string
	 */
	protected $version = '';


	/**
	 * @param string $name
	 * @param string $uri
	 * @param string $version
	 */
	public function __construct($name, $uri = '', $version = '') {
		$this->name = $name;
		$this->uri = $uri;
		$this->version = $version;
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
	public function getUri() {
		return $this->uri;
	}

	/**
	 * @return string
	 */
	public function getVersion() {
		return $this->version;
	}
	

	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'generator') {
		$feedWriter->startElement($tagName);

		if ($this->getUri() !== '')
			$feedWriter->writeAttribute('uri', $this->getUri());
		if ($this->getVersion() !== '')
			$feedWriter->writeAttribute('version', $this->getVersion());
		$feedWriter->writeRaw($this->getName());

		$feedWriter->endElement();
	}

}