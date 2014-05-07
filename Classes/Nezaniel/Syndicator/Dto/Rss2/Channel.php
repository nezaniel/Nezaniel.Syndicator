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
use Nezaniel\Syndicator\Core\Syndicator;

/**
 * An RSS channel
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#requiredChannelElements
 */
class Channel extends AbstractXmlWriterSerializable implements ChannelInterface{

	/* Required elements */
	/**
	 * @var string
	 */
	protected $title;

	/**
	 * @var string
	 */
	protected $link;

	/**
	 * @var string
	 */
	protected $description;


	/* Optional elements */
	/**
	 * @var  string
	 */
	protected $language;

	/**
	 * @var string
	 */
	protected $copyright;

	/**
	 * @var string
	 */
	protected $managingEditor;

	/**
	 * @var string
	 */
	protected $webMaster;

	/**
	 * @var \DateTime
	 */
	protected $pubDate;

	/**
	 * @var \SplObjectStorage<Category>
	 */
	protected $categories;

	/**
	 * @var string
	 */
	protected $generator = 'Nezaniel.Syndicator';

	/**
	 * @var string
	 */
	protected $docs = 'http://blogs.law.harvard.edu/tech/rss';

	/**
	 * @var Cloud
	 */
	protected $cloud;

	/**
	 * @var integer
	 */
	protected $ttl;

	/**
	 * @var Image
	 */
	protected $image;

	/**
	 * @var string
	 */
	protected $rating;

	/**
	 * @var TextInput
	 */
	protected $textInput;

	/**
	 * @var array<integer>
	 */
	protected $skipHours;

	/**
	 * @var array<string>
	 */
	protected $skipDays;

	/**
	 * @var string
	 */
	protected $atomLink;

	/**
	 * @var array<Item>
	 */
	protected $items;

	/**
	 * @var string
	 */
	protected $tagName = 'channel';


	/**
	 * @param string            $title
	 * @param string            $link
	 * @param string            $description
	 * @param string            $language
	 * @param string            $copyright
	 * @param string            $managingEditor
	 * @param string            $webMaster
	 * @param \DateTime         $pubDate
	 * @param \SplObjectStorage $categories
	 * @param string            $generator
	 * @param string            $docs
	 * @param Cloud             $cloud
	 * @param null              $ttl
	 * @param Image             $image
	 * @param string            $rating
	 * @param TextInput         $textInput
	 * @param array             $skipHours
	 * @param array             $skipDays
	 * @param string            $atomLink
	 * @param \SplObjectStorage $items
	 */
	public function __construct($title, $link, $description,
		$language = '', $copyright = '', $managingEditor = '', $webMaster = '',
		\DateTime $pubDate = NULL, \SplObjectStorage $categories = NULL,
		$generator = '', $docs = 'http://blogs.law.harvard.edu/tech/rss',
		Cloud $cloud = NULL, $ttl = NULL, Image $image = NULL, $rating = '', TextInput $textInput = NULL,
		array $skipHours = array(), array $skipDays = array(), $atomLink = '', \SplObjectStorage $items = NULL) {

			$this->title = $title;
			$this->link = $link;
			$this->description = $description;

			$this->language = $language;
			$this->copyright = $copyright;
			$this->managingEditor = $managingEditor;
			$this->webMaster = $webMaster;
			$this->generator = ($generator !== '' ? $generator : 'Nezaniel.Syndicator ' . Syndicator::VERSION);
			$this->pubDate = $pubDate;
			$this->categories = ($categories !== NULL ? $categories : new \SplObjectStorage());
			$this->docs = $docs;
			$this->cloud = $cloud;
			$this->ttl = $ttl;
			$this->image = $image;
			$this->rating = $rating;
			$this->textInput = $textInput;
			$this->skipHours = $skipHours;
			$this->skipDays = $skipDays;
			$this->atomLink = $atomLink;
			$this->items = ($items !== NULL ? $items : new \SplObjectStorage());
	}


	/**
	 * @return \SplObjectStorage<Category>
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * @param \SplObjectStorage $categories
	 * @return void
	 */
	public function setCategories(\SplObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * @param Category $category
	 * @return $this
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
	 * @return Cloud
	 */
	public function getCloud() {
		return $this->cloud;
	}

	/**
	 * @param Cloud $cloud
	 * @return void
	 */
	public function setCloud($cloud) {
		$this->cloud = $cloud;
	}

	/**
	 * @return string
	 */
	public function getCopyright() {
		return $this->copyright;
	}

	/**
	 * @param string $copyright
	 * @return void
	 */
	public function setCopyright($copyright) {
		$this->copyright = $copyright;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
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
	public function getDocs() {
		return $this->docs;
	}

	/**
	 * @param string $docs
	 * @return void
	 */
	public function setDocs($docs) {
		$this->docs = $docs;
	}

	/**
	 * @return string
	 */
	public function getGenerator() {
		return $this->generator;
	}

	/**
	 * @param string $generator
	 * @return void
	 */
	public function setGenerator($generator) {
		$this->generator = $generator;
	}

	/**
	 * @return Image
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param Image $image
	 * @return void
	 */
	public function setImage(Image $image) {
		$this->image = $image;
	}

	/**
	 * @return \SplObjectStorage
	 */
	public function getItems() {
		return $this->items;
	}

	/**
	 * @param \SplObjectStorage $items
	 * @return void
	 */
	public function setItems(\SplObjectStorage $items) {
		$this->items = $items;
	}

	/**
	 * @param Item $item
	 * @return $this
	 */
	public function addItem(Item $item) {
		$this->items->attach($item);
		return $this;
	}

	/**
	 * @param Item $item
	 * @return $this
	 */
	public function removeItem(Item $item) {
		$this->items->detach($item);
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * @param string $language
	 * @return void
	 */
	public function setLanguage($language) {
		$this->language = $language;
	}

	/**
	 * @return string
	 */
	public function getLink() {
		return $this->link;
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
	public function getManagingEditor() {
		return $this->managingEditor;
	}

	/**
	 * @param string $managingEditor
	 * @return void
	 */
	public function setManagingEditor($managingEditor) {
		$this->managingEditor = $managingEditor;
	}

	/**
	 * @return \DateTime
	 */
	public function getPubDate() {
		return $this->pubDate;
	}

	/**
	 * @param \DateTime $pubDate
	 * @return void
	 */
	public function setPubDate(\DateTime $pubDate) {
		$this->pubDate = $pubDate;
	}

	/**
	 * @return string
	 */
	public function getRating() {
		return $this->rating;
	}

	/**
	 * @param string $rating
	 * @return void
	 */
	public function setRating($rating) {
		$this->rating = $rating;
	}

	/**
	 * @return array
	 */
	public function getSkipDays() {
		return $this->skipDays;
	}

	/**
	 * @param array $skipDays
	 * @return void
	 */
	public function setSkipDays($skipDays) {
		$this->skipDays = $skipDays;
	}

	/**
	 * @param string $dayToSkip
	 * @return $this
	 */
	public function addDayToSkip($dayToSkip) {
		if (!in_array($dayToSkip, $this->skipDays)) {
			$this->skipDays[] = $dayToSkip;
		}
		return $this;
	}

	/**
	 * @param string $dayNotToSkip
	 * @return $this
	 */
	public function removeDayToSkip($dayNotToSkip) {
		if (($key = array_search($dayNotToSkip, $this->skipDays)) !== FALSE) {
			unset($this->skipDays[$key]);
		}
		return $this;
	}

	/**
	 * @return array
	 */
	public function getSkipHours() {
		return $this->skipHours;
	}

	/**
	 * @param array $skipHours
	 * @return void
	 */
	public function setSkipHours(array $skipHours) {
		$this->skipHours = $skipHours;
	}

	/**
	 * @param $hourToSkip
	 * @return $this
	 */
	public function addHourToSkip($hourToSkip) {
		if (!in_array($hourToSkip, $this->skipHours)) {
			$this->skipHours[] = $hourToSkip;
		}
		return $this;
	}

	/**
	 * @param $hourNotToSkip
	 * @return $this
	 */
	public function removeHourToSkip($hourNotToSkip) {
		if (($key = array_search($hourNotToSkip, $this->skipHours)) !== FALSE) {
			unset($this->skipHours[$key]);
		}
		return $this;
	}

	/**
	 * @return TextInput
	 */
	public function getTextInput() {
		return $this->textInput;
	}

	/**
	 * @param TextInput $textInput
	 * @return void
	 */
	public function setTextInput(TextInput $textInput) {
		$this->textInput = $textInput;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return integer
	 */
	public function getTtl() {
		return $this->ttl;
	}

	/**
	 * @param integer $ttl
	 * @return void
	 */
	public function setTtl($ttl) {
		$this->ttl = $ttl;
	}

	/**
	 * @return string
	 */
	public function getWebMaster() {
		return $this->webMaster;
	}

	/**
	 * @param string $webMaster
	 * @return void
	 */
	public function setWebMaster($webMaster) {
		$this->webMaster = $webMaster;
	}

	/**
	 * @param string $atomLink
	 */
	public function setAtomLink($atomLink) {
		$this->atomLink = $atomLink;
	}

	/**
	 * @return string
	 */
	public function getAtomLink() {
		return $this->atomLink;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement($this->getTagName());

		$feedWriter->writeElement('title', $this->getTitle());
		$feedWriter->writeElement('link', $this->getLink());
		$feedWriter->writeElement('description', $this->getDescription());

		if ($this->getLanguage() !== '')
			$feedWriter->writeElement('language', $this->getLanguage());
		if ($this->getCopyright() !== '')
			$feedWriter->writeElement('copyright', $this->getCopyright());
		if ($this->getManagingEditor() !== '')
			$feedWriter->writeElement('managingEditor', $this->getManagingEditor());
		if ($this->getWebMaster() !== '')
			$feedWriter->writeElement('webMaster', $this->getWebMaster());
		if ($this->getPubDate() instanceof \DateTime)
			$feedWriter->writeElement('pubDate', $this->getPubDate()->format(\DateTime::RSS));

		$now = new \DateTime();
		$feedWriter->writeElement('lastBuildDate', $now->format(\DateTime::RSS));

		if ($this->getCategories()->count() > 0) {
			foreach ($this->getCategories() as $category) {
				/** @var Category $category */
				$feedWriter->writeRaw($category->xmlSerialize());
			}
		}

		if ($this->getGenerator() !== '')
			$feedWriter->writeElement('generator', $this->getGenerator());
		if ($this->getDocs() !== '')
			$feedWriter->writeElement('docs', $this->getDocs());
		if ($this->getCloud() instanceof Cloud)
			$feedWriter->writeRaw($this->getCloud()->xmlSerialize());
		if ($this->getTtl() !== NULL)
			$feedWriter->writeElement('ttl', $this->getTtl());
		if ($this->getImage() instanceof Image)
			$feedWriter->writeRaw($this->getImage()->xmlSerialize());
		if ($this->getRating() !== '')
			$feedWriter->writeElement('rating', $this->getRating());
		if ($this->getTextInput() instanceof TextInput)
			$feedWriter->writeRaw($this->getTextInput()->xmlSerialize());

		if (sizeof($this->getSkipHours()) > 0) {
			$feedWriter->startElement('skipHours');
			foreach ($this->getSkipHours() as $hourToSkip) {
				$feedWriter->writeElement('hour', $hourToSkip);
			}
			$feedWriter->endElement();
		}

		if (sizeof($this->getSkipDays()) > 0) {
			$feedWriter->startElement('skipDays');
			foreach ($this->getSkipDays() as $dayToSkip) {
				$feedWriter->writeElement('day', $dayToSkip);
			}
			$feedWriter->endElement();
		}

		if ($this->getAtomLink() !== '') {
			$feedWriter->startElement('atom:link');
			$feedWriter->writeAttribute('href', $this->getAtomLink());
			$feedWriter->writeAttribute('rel', 'self');
			$feedWriter->writeAttribute('type', Syndicator::CONTENTTYPE_RSS2);
			$feedWriter->endElement();
		}

		if ($this->getItems()->count() > 0) {
			foreach ($this->getItems() as $item) {
				/** @var Item $item */
				$feedWriter->writeRaw($item->xmlSerialize());
			}
		}

		$feedWriter->endElement();
	}

}