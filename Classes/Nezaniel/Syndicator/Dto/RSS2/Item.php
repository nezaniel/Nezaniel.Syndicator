<?php
namespace Nezaniel\Syndicator\Dto\Rss2;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Nezaniel.Feeder".       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */
use Doctrine\Common\Collections\ArrayCollection;
use Nezaniel\Syndicator\Core\XmlWriterSerializableInterface;
use Nezaniel\Syndicator\Dto\Rss2\Exception\MissingItemDescriptionException;
use TYPO3\Flow\Annotations as Flow;

/**
 * An RSS item
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#hrelementsOfLtitemgt
 */
class Item implements XmlWriterSerializableInterface {

	/**
	 * @var string
	 */
	protected $title = '';

	/**
	 * @var string
	 */
	protected $link = '';

	/**
	 * @var string
	 */
	protected $description = '';

	/**
	 * @var string
	 */
	protected $author = '';

	/**
	 * @var array
	 */
	protected $categories = array();

	/**
	 * @var string
	 */
	protected $comments = '';

	/**
	 * @var Enclosure
	 */
	protected $enclosure;

	/**
	 * @var string
	 */
	protected $guid = '';

	/**
	 * @var string
	 */
	protected $pubDate = '';

	/**
	 * @var Source
	 */
	protected $source;


	/**
	 * @param string $title
	 * @param string $link
	 * @param string $description
	 * @param string $author
	 * @param ArrayCollection $categories
	 * @param string $comments
	 * @param Enclosure $enclosure
	 * @param string $guid
	 * @param string $pubDate
	 * @param Source $source
	 * @throws MissingItemDescriptionException
	 */
	public function __construct($title = '', $link = '', $description = '', $author = '', ArrayCollection $categories = NULL, $comments = '',
								Enclosure $enclosure = NULL, $guid = '', $pubDate = '', Source $source = NULL) {

		if ($title === '' && $description === '') {
			throw new MissingItemDescriptionException('For creating an RSS item, at least title or description must be given', 1398432247);
		}
		$this->title = $title;
		$this->link = $link;
		$this->description = $description;
		$this->author = $author;
		if ($categories instanceof ArrayCollection) {
			$this->categories = $categories->toArray();
		}
		$this->comments = $comments;
		$this->enclosure = $enclosure;
		$this->guid = $guid;
		$this->pubDate = $pubDate;
		$this->source = $source;
	}

	/**
	 * @return string
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @return Category[]
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * @return string
	 */
	public function getComments() {
		return $this->comments;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @return Enclosure
	 */
	public function getEnclosure() {
		return $this->enclosure;
	}

	/**
	 * @return string
	 */
	public function getGuid() {
		return $this->guid;
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
	public function getPubDate() {
		return $this->pubDate;
	}

	/**
	 * @return Source
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'item') {
		$feedWriter->startElement($tagName);

		if ($this->getTitle() !== '') $feedWriter->writeElement('title', $this->getTitle());
		if ($this->getLink() !== '') $feedWriter->writeElement('link', $this->getLink());
		if ($this->getDescription() !== '')  {
			$feedWriter->startElement('description');
			$feedWriter->writeCdata($this->getDescription());
			$feedWriter->endElement();
		}
		if ($this->getAuthor() !== '') $feedWriter->writeElement('author', $this->getAuthor());
		if (sizeof($this->getCategories()) > 0) {
			foreach ($this->getCategories() as $category) {
				$category->xmlSerializeUsingWriter($feedWriter);
			}
		}
		if ($this->getComments() !== '') $feedWriter->writeElement('comments', $this->getComments());
		if ($this->getEnclosure() !== NULL) $this->getEnclosure()->xmlSerialize($feedWriter);
		if ($this->getGuid() !== '') $feedWriter->writeElement('guid', $this->getGuid());
		if ($this->getPubDate() !== '') $feedWriter->writeElement('pubDate', $this->getPubDate());
		if ($this->getSource() !== NULL) $this->getSource()->xmlSerialize($feedWriter);

		$feedWriter->endElement();
	}

}