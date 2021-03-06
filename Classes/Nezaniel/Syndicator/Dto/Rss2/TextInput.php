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
 * An RSS text input reference
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#lttextinputgtSubelementOfLtchannelgt
 */
class TextInput extends AbstractXmlWriterSerializable implements TextInputInterface {

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $name;

	/**
	 * @var string
	 */
	protected $link;

	/**
	 * @var string
	 */
	protected $tagName = 'textInput';


	/**
	 * @param string $title
	 * @param string $description
	 * @param string $name
	 * @param string $link
	 */
	public function __construct($title, $description, $name, $link) {
		$this->title = $title;
		$this->description = $description;
		$this->name = $name;
		$this->link = $link;
	}


	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return string
	 */
	public function getLink() {
		return $this->link;
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
	public function getTitle() {
		return $this->title;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeElement('title', $this->getTitle());
		$feedWriter->writeElement('description', $this->getDescription());
		$feedWriter->writeElement('name', $this->getName());
		$feedWriter->writeElement('link', $this->getLink());

		$feedWriter->endElement();
	}

}