<?php
namespace Nezaniel\Syndicator\Dto\Atom;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Core\AbstractXmlWriterSerializable;

/**
 * An Atom person construct
 *
 * @see http://www.atomenabled.org/developers/syndication/#person
 */
class Person extends AbstractXmlWriterSerializable {

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $uri;

	/**
	 * @var string
	 */
	protected $email;


	/**
	 * @param string $name
	 * @param string $uri
	 * @param string $email
	 */
	public function __construct($name, $uri = '', $email = '') {
		$this->name = $name;
		$this->uri = $uri;
		$this->email = $email;
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
	public function getEmail() {
		return $this->email;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeElement('name', $this->getName());
		if ($this->getUri() !== NULL) {
			$feedWriter->writeElement('uri', $this->getUri());
		}
		if ($this->getEmail() !== NULL) {
			$feedWriter->writeElement('email', $this->getEmail());
		}

		$feedWriter->endElement();
	}

}