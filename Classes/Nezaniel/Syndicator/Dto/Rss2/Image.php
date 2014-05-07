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
 * An RSS channel image
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltimagegtSubelementOfLtchannelgt
 */
class Image extends AbstractXmlWriterSerializable implements ImageInterface {

	/**
	 * @var string
	 */
	protected $url;

	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $link;

	/**
	 * @var integer
	 */
	protected $width;

	/**
	 * @var integer
	 */
	protected $height;

	/**
	 * @var string
	 */
	protected $description;

	/**
	 * @var string
	 */
	protected $tagName = 'image';


	/**
	 * @param string  $url
	 * @param string  $title
	 * @param string  $link
	 * @param integer $width
	 * @param integer $height
	 * @param string  $description
	 */
	public function __construct($url, $title, $link, $width = NULL, $height = NULL, $description = '') {
		$this->url = $url;
		$this->title = $title;
		$this->link = $link;
		$this->width = $width;
		$this->height = $height;
		$this->description = $description;
	}


	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param int $height
	 */
	public function setHeight($height) {
		$this->height = $height;
	}

	/**
	 * @return integer
	 */
	public function getHeight() {
		return $this->height;
	}

	/**
	 * @param string $link
	 */
	public function setLink($link) {
		$this->link = $link;
	}

	/**
	 * @return string
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $url
	 */
	public function setUrl($url) {
		$this->url = $url;
	}

	/**
	 * @return string
	 */
	public function getUrl() {
		return $this->url;
	}

	/**
	 * @param integer $width
	 */
	public function setWidth($width) {
		$this->width = $width;
	}

	/**
	 * @return integer
	 */
	public function getWidth() {
		return $this->width;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeElement('url', $this->getUrl());
		$feedWriter->writeElement('title', $this->getTitle());
		$feedWriter->writeElement('link', $this->getLink());

		if ($this->getWidth() !== NULL) {
			$feedWriter->writeElement('width', $this->getWidth());
		}
		if ($this->getHeight() !== NULL) {
			$feedWriter->writeElement('height', $this->getHeight());
		}
		if ($this->description !== '') {
			$feedWriter->writeElement('description', $this->getDescription());
		}

		$feedWriter->endElement();
	}

}