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
 * An Atom category construct
 *
 * @see http://www.atomenabled.org/developers/syndication/#category
 */
class Category implements XmlWriterSerializableInterface{

	/**
	 * @var string
	 */
	protected $term;

	/**
	 * @var string
	 */
	protected $scheme = '';

	/**
	 * @var string
	 */
	protected $label = '';


	/**
	 * @param string $term
	 * @param string $scheme
	 * @param string $label
	 */
	public function __construct($term, $scheme = '', $label = '') {
		$this->term = $term;
		$this->scheme = $scheme;
		$this->label = $label;
	}


	/**
	 * @return string
	 */
	public function getTerm() {
		return $this->term;
	}

	/**
	 * @return string
	 */
	public function getScheme() {
		return $this->scheme;
	}

	/**
	 * @return string
	 */
	public function getLabel() {
		return $this->label;
	}
	

	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'category') {
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('term', $this->getTerm());
		if ($this->getScheme() !== '') {
			$feedWriter->writeAttribute('scheme', $this->getScheme());
		}
		if ($this->getLabel() !== '') {
			$feedWriter->writeAttribute('label', $this->getLabel());
		}

		$feedWriter->endElement();
	}

}