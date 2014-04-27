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
 * An Atom link construct
 *
 * @see http://www.atomenabled.org/developers/syndication/#link
 */
class Link implements XmlWriterSerializableInterface{

	/**
	 * An alternate representation of the entry or feed, for example a permalink to the html version of the entry, or the front page of the weblog.
	 */
	const REL_ALTERNATE = 'alternate';

	/**
	 * A related resource which is potentially large in size and might require special handling, for example an audio or video recording.
	 */
	const REL_ENCLOSURE = 'enclosure';

	/**
	 * A document related to the entry or feed.
	 */
	const REL_RELATED = 'related';

	/**
	 * The feed itself.
	 */
	const REL_SELF = 'self';

	/**
	 * The source of the information provided in the entry.
	 */
	const REL_VIA = 'via';


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
	 * @param string $href
	 * @param string $rel
	 * @param string $type
	 * @param string $hreflang
	 * @param string $title
	 * @param integer $length
	 */
	function __construct($href, $rel = '', $type = '', $hreflang = '', $title = '', $length = 0) {
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
	 * @return string
	 */
	public function getRel() {
		return $this->rel;
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
	public function getHreflang() {
		return $this->hreflang;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return integer
	 */
	public function getLength() {
		return $this->length;
	}
	

	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'link') {
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('href', $this->getHref());
		if ($this->getRel() !== '') {
			$feedWriter->writeAttribute('rel', $this->getRel());
		}
		if ($this->getType() !== '') {
			$feedWriter->writeAttribute('type', $this->getType());
		}
		if ($this->getHreflang() !== '') {
			$feedWriter->writeAttribute('hreflang', $this->getHreflang());
		}
		if ($this->getTitle() !== '') {
			$feedWriter->writeAttribute('title', $this->getTitle());
		}
		if ($this->getLength() > 0) {
			$feedWriter->writeAttribute('length', $this->getLength());
		}

		$feedWriter->endElement();
	}

}