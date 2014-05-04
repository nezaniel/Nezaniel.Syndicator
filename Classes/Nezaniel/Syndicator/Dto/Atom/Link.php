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
 * An Atom Link implementation
 *
 * @see http://www.atomenabled.org/developers/syndication/#link
 */
class Link extends AbstractXmlWriterSerializable implements  LinkInterface {

	/**
	 * @var string
	 */
	protected $href = '';

	/**
	 * @var string
	 */
	protected $rel = '';

	/**
	 * @var string
	 */
	protected $type = '';

	/**
	 * @var string
	 */
	protected $hreflang = '';

	/**
	 * @var string
	 */
	protected $title = '';

	/**
	 * @var integer
	 */
	protected $length = 0;

	/**
	 * @var string
	 */
	protected $tagName = 'link';


	/**
	 * @param string $href
	 * @param string $rel
	 * @param string $type
	 * @param string $hreflang
	 * @param string $title
	 * @param integer $length
	 */
	function __construct($href, $rel = '', $type = '', $hreflang = '', $title = '', $length = NULL) {
		$this->href = $href;
		$this->rel = $rel;
		$this->type = $type;
		$this->hreflang = $hreflang;
		$this->title = $title;
		$this->length = $length;
	}


	/**
	 * @return string
	 */
	public function getHref() {
		return $this->href;
	}

	/**
	 * @param string $href
	 */
	public function setHref($href) {
		$this->href = $href;
	}

	/**
	 * @return string
	 */
	public function getRel() {
		return $this->rel;
	}

	/**
	 * @param string $rel
	 */
	public function setRel($rel) {
		$this->rel = $rel;
	}

	/**
	 * @return string
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param string $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @return string
	 */
	public function getHreflang() {
		return $this->hreflang;
	}

	/**
	 * @param string $hreflang
	 */
	public function setHreflang($hreflang) {
		$this->hreflang = $hreflang;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return integer
	 */
	public function getLength() {
		return $this->length;
	}

	/**
	 * @param int $length
	 */
	public function setLength($length) {
		$this->length = $length;
	}
	

	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeAttribute('href', $this->getHref());
		if ($this->getRel() !== '')
			$feedWriter->writeAttribute('rel', $this->getRel());
		if ($this->getType() !== '')
			$feedWriter->writeAttribute('type', $this->getType());
		if ($this->getHreflang() !== '')
			$feedWriter->writeAttribute('hreflang', $this->getHreflang());
		if ($this->getTitle() !== '')
			$feedWriter->writeAttribute('title', $this->getTitle());
		if ($this->getLength() !== NULL)
			$feedWriter->writeAttribute('length', $this->getLength());

		$feedWriter->endElement();
	}

}