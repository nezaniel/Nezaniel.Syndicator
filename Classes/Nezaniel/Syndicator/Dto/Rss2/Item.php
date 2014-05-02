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
 * An RSS item
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#hrelementsOfLtitemgt
 */
class Item extends AbstractXmlWriterSerializable {

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
	 * @var \SplObjectStorage<Category>
	 */
	protected $categories;

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
	 * @var boolean
	 */
	protected $permaLink = FALSE;

	/**
	 * @var \DateTime
	 */
	protected $pubDate;

	/**
	 * @var Source
	 */
	protected $source;

	/**
	 * @var string
	 */
	protected $tagName = 'item';


	/**
	 * @param string            $title
	 * @param string            $link
	 * @param string            $description
	 * @param string            $author
	 * @param \SplObjectStorage $categories
	 * @param string            $comments
	 * @param Enclosure         $enclosure
	 * @param string            $guid
	 * @param boolean           $permaLink
	 * @param \DateTime         $pubDate
	 * @param Source            $source
	 */
	public function __construct($title = '', $link = '', $description = '', $author = '', \SplObjectStorage $categories = NULL, $comments = '',
		Enclosure $enclosure = NULL, $guid = '', $permaLink = FALSE, \DateTime $pubDate = NULL, Source $source = NULL) {

			$this->title = $title;
			$this->link = $link;
			$this->description = $description;
			$this->author = $author;
			$this->categories = ($categories !== NULL ? $categories : new \SplObjectStorage());
			$this->comments = $comments;
			$this->enclosure = $enclosure;
			$this->guid = $guid;
			$this->permaLink = $permaLink;
			$this->pubDate = $pubDate;
			$this->source = $source;
	}


	/**
	 * @param string $author
	 */
	public function setAuthor($author) {
		$this->author = $author;
	}

	/**
	 * @return string
	 */
	public function getAuthor() {
		return $this->author;
	}

	/**
	 * @param \SplObjectStorage $categories
	 * @return void
	 */
	public function setCategories(\SplObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * @return \SplObjectStorage<Category>
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * @param Category $category
	 * @return $this;
	 */
	public function addCategory(Category $category) {
		$this->categories->attach($category);
		return $this;
	}

	/**
	 * @param Category $category
	 * @return $this
	 */
	public function removeCategory(Category $category) {
		$this->categories->detach($category);
		return $this;
	}

	/**
	 * @param string $comments
	 * @return void
	 */
	public function setComments($comments) {
		$this->comments = $comments;
	}

	/**
	 * @return string
	 */
	public function getComments() {
		return $this->comments;
	}

	/**
	 * @param string $description
	 * @return void
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
	 * @param Enclosure $enclosure
	 * @return void
	 */
	public function setEnclosure($enclosure) {
		$this->enclosure = $enclosure;
	}

	/**
	 * @return Enclosure
	 */
	public function getEnclosure() {
		return $this->enclosure;
	}

	/**
	 * @param string $guid
	 * @return void
	 */
	public function setGuid($guid) {
		$this->guid = $guid;
	}

	/**
	 * @return string
	 */
	public function getGuid() {
		return $this->guid;
	}

	/**
	 * @param boolean $permaLink
	 */
	public function setPermaLink($permaLink) {
		$this->permaLink = $permaLink;
	}

	/**
	 * @return boolean
	 */
	public function getPermaLink() {
		return $this->permaLink;
	}

	/**
	 * @param string $link
	 * @return void
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
	 * @param \DateTime $pubDate
	 * @return void
	 */
	public function setPubDate(\DateTime $pubDate) {
		$this->pubDate = $pubDate;
	}

	/**
	 * @return \DateTime
	 */
	public function getPubDate() {
		return $this->pubDate;
	}

	/**
	 * @param Source $source
	 * @return void
	 */
	public function setSource($source) {
		$this->source = $source;
	}

	/**
	 * @return Source
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * @param string $title
	 * @return void
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
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		if ($this->getTitle() !== '')
			$feedWriter->writeElement('title', $this->getTitle());
		if ($this->getLink() !== '')
			$feedWriter->writeElement('link', $this->getLink());
		if ($this->getDescription() !== '')  {
			$feedWriter->startElement('description');
			$feedWriter->writeCdata($this->getDescription());
			$feedWriter->endElement();
		}
		if ($this->getAuthor() !== '')
			$feedWriter->writeElement('author', $this->getAuthor());
		if ($this->getCategories()->count() > 0) {
			foreach ($this->getCategories() as $category) {
				/** @var Category $category */
				$feedWriter->writeRaw($category->xmlSerialize());
			}
		}
		if ($this->getComments() !== '')
			$feedWriter->writeElement('comments', $this->getComments());
		if ($this->getEnclosure() instanceof Enclosure)
			$feedWriter->writeRaw($this->getEnclosure()->xmlSerialize());
		if ($this->getGuid() !== '') {
			$feedWriter->startElement('guid');
			$feedWriter->writeAttribute('isPermaLink', $this->getPermaLink()?'true':'false');
			$feedWriter->writeRaw($this->getGuid());
			$feedWriter->endElement();
		}
		if ($this->getPubDate() instanceof \DateTime)
			$feedWriter->writeElement('pubDate', $this->getPubDate()->format(\DateTime::RSS));
		if ($this->getSource() instanceof Source)
			$feedWriter->writeRaw($this->getSource()->xmlSerialize());

		$feedWriter->endElement();
	}

}