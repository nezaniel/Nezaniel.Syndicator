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
 * An Atom text construct
 *
 * @see http://www.atomenabled.org/developers/syndication/#text
 */
class Text extends AbstractXmlWriterSerializable {

	const TYPE_TEXT = 'text';
	const TYPE_HTML = 'html';
	const TYPE_XHTML = 'xhtml';


	/**
	 * @var string
	 */
	protected $type;

	/**
	 * @var string
	 */
	protected $content;


	/**
	 * @param string $type
	 * @param string $content
	 */
	public function __construct($type, $content) {
		$this->type = $type;
		$this->content = $content;
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
	public function getContent() {
		return $this->content;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeAttribute('type', $this->getType());
		$feedWriter->writeRaw($this->getContent());

		$feedWriter->endElement();
	}

}