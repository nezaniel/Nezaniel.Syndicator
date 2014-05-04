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
use Nezaniel\Syndicator\Core\Syndicator;

/**
 * An Atom Feed implementation
 *
 * @see http://www.atomenabled.org/developers/syndication/#feed
 */
class Feed extends AbstractXmlWriterSerializable implements FeedInterface {

	/* Required elements */
	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var Text
	 */
	protected $title;

	/**
	 * @var \DateTime
	 */
	protected $updated;


	/* Recommended elements */
	/**
	 * @var \SplObjectStorage<Person>
	 */
	protected $authors;

	/**
	 * @var \SplObjectStorage<Link>
	 */
	protected $links;


	/* Optional elements */
	/**
	 * @var \SplObjectStorage<Category>
	 */
	protected $categories;

	/**
	 * @var \SplObjectStorage<Person>
	 */
	protected $contributors;

	/**
	 * @var Generator
	 */
	protected $generator;

	/**
	 * @var string
	 */
	protected $icon;

	/**
	 * @var string
	 */
	protected $logo;

	/**
	 * @var Text
	 */
	protected $rights;

	/**
	 * @var Text
	 */
	protected $subtitle;

	/**
	 * @var \SplObjectStorage<Entry>
	 */
	protected $entries;

	/**
	 * @var string
	 */
	protected $tagName = 'feed';


	/**
	 * @param string            $id
	 * @param Text              $title
	 * @param \DateTime         $updated
	 * @param \SplObjectStorage $authors
	 * @param \SplObjectStorage $links
	 * @param \SplObjectStorage $categories
	 * @param \SplObjectStorage $contributors
	 * @param Generator         $generator
	 * @param string            $icon
	 * @param string            $logo
	 * @param Text              $rights
	 * @param Text              $subtitle
	 * @param \SplObjectStorage $entries
	 */
	public function __construct($id, Text $title, \DateTime $updated,
		\SplObjectStorage $authors = NULL, \SplObjectStorage $links = NULL,
		\SplObjectStorage $categories = NULL, \SplObjectStorage $contributors = NULL, Generator $generator = NULL,
		$icon = '', $logo = '', Text $rights = NULL, Text $subtitle = NULL, \SplObjectStorage $entries = NULL) {

			$this->id = $id;
			$this->title = $title;
			$this->updated = $updated;

			$this->authors = ($authors !== NULL ? $authors : new \SplObjectStorage());
			$this->links = ($links !== NULL ? $links : new \SplObjectStorage());

			$this->categories = ($categories !== NULL ? $categories : new \SplObjectStorage());
			$this->contributors = ($contributors !== NULL ? $contributors : new \SplObjectStorage());
			$this->generator = ($generator !== NULL ? $generator : new Generator('Nezaniel.Syndicator', 'https://github.com/nezaniel/Nezaniel.Syndicator', Syndicator::VERSION));
			$this->icon = $icon;
			$this->logo = $logo;
			$this->rights = $rights;
			$this->subtitle = $subtitle;
			$this->entries = ($entries !== NULL ? $entries : new \SplObjectStorage());
			$this->tagName = 'feed';
	}

	/**
	 * @param \SplObjectStorage $authors
	 * @return void
	 */
	public function setAuthors(\SplObjectStorage $authors) {
		$this->authors = $authors;
	}

	/**
	 * @return \SplObjectStorage<Person>
	 */
	public function getAuthors() {
		return $this->authors;
	}

	/**
	 * @param Person $author
	 * @return $this
	 */
	public function addAuthor(Person $author) {
		$this->authors->attach($author);
		return $this;
	}

	/**
	 * @param Person $author
	 * @return $this
	 */
	public function removeAuthor(Person $author) {
		$this->authors->detach($author);
		return $this;
	}

	/**
	 * @param \SplObjectStorage $categories
	 * @return void
	 */
	public function setCategories(\SplObjectStorage $categories) {
		$this->categories = $categories;
	}

	/**
	 * @return \SplObjectStorage
	 */
	public function getCategories() {
		return $this->categories;
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
	 * @param \SplObjectStorage $contributors
	 * @return void
	 */
	public function setContributors(\SplObjectStorage $contributors) {
		$this->contributors = $contributors;
	}

	/**
	 * @return \SplObjectStorage
	 */
	public function getContributors() {
		return $this->contributors;
	}

	/**
	 * @param Person $contributor
	 * @return $this
	 */
	public function addContributor(Person $contributor) {
		$this->contributors->attach($contributor);
		return $this;
	}

	/**
	 * @param Person $contributor
	 * @return $this
	 */
	public function removeContributor(Person $contributor) {
		$this->contributors->detach($contributor);
		return $this;
	}

	/**
	 * @param \SplObjectStorage $entries
	 * @return void
	 */
	public function setEntries(\SplObjectStorage $entries) {
		$this->entries = $entries;
	}

	/**
	 * @return \SplObjectStorage
	 */
	public function getEntries() {
		return $this->entries;
	}

	/**
	 * @param Entry $entry
	 * @return $this
	 */
	public function addEntry(Entry $entry) {
		$this->entries->attach($entry);
		return $this;
	}

	/**
	 * @param Generator $generator
	 * @return void
	 */
	public function setGenerator($generator) {
		$this->generator = $generator;
	}

	/**
	 * @return Generator
	 */
	public function getGenerator() {
		return $this->generator;
	}

	/**
	 * @param string $icon
	 * @return void
	 */
	public function setIcon($icon) {
		$this->icon = $icon;
	}

	/**
	 * @return string
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * @param string $id
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param \SplObjectStorage $links
	 * @return void
	 */
	public function setLinks(\SplObjectStorage $links) {
		$this->links = $links;
	}

	/**
	 * @return \SplObjectStorage
	 */
	public function getLinks() {
		return $this->links;
	}

	/**
	 * @param Link $link
	 * @return $this
	 */
	public function addLink(Link $link) {
		$this->links->attach($link);
		return $this;
	}

	/**
	 * @param Link $link
	 * @return $this
	 */
	public function removeLink(Link $link) {
		$this->links->detach($link);
		return $this;
	}

	/**
	 * @param string $logo
	 * @return void
	 */
	public function setLogo($logo) {
		$this->logo = $logo;
	}

	/**
	 * @return string
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * @param Text $rights
	 * @return void
	 */
	public function setRights(Text $rights) {
		$this->rights = $rights;
	}

	/**
	 * @return Text
	 */
	public function getRights() {
		return $this->rights;
	}

	/**
	 * @param Text $subtitle
	 * @return void
	 */
	public function setSubtitle(Text $subtitle) {
		$this->subtitle = $subtitle;
	}

	/**
	 * @return Text
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * @param Text $title
	 * @return void
	 */
	public function setTitle(Text $title) {
		$this->title = $title;
	}

	/**
	 * @return Text
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param \DateTime $updated
	 * @return void
	 */
	public function setUpdated(\DateTime $updated) {
		$this->updated = $updated;
	}

	/**
	 * @return \DateTime
	 */
	public function getUpdated() {
		return $this->updated;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return string
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		if ($this->getTagName() === 'feed') {
			$feedWriter->startElement($this->getTagName());
			$feedWriter->writeAttribute('xmlns', 'http://www.w3.org/2005/Atom');
		}

		$feedWriter->writeElement('id', $this->getId());
		$this->getTitle()->setTagName('title');
		$feedWriter->writeRaw($this->getTitle()->xmlSerialize());
		$feedWriter->writeElement('updated', $this->getUpdated()->format(\DateTime::ATOM));

		if ($this->getAuthors()->count() > 0) {
			foreach ($this->getAuthors() as $author) {
				/** @var Person $author */
				$author->setTagName('author');
				$feedWriter->writeRaw($author->xmlSerialize());
			}
		}
		if ($this->getLinks()->count() > 0) {
			foreach ($this->getLinks() as $link) {
				/** @var Link $link */
				$feedWriter->writeRaw($link->xmlSerialize());
			}
		}

		if ($this->getCategories()->count() > 0) {
			foreach ($this->getCategories() as $category) {
				/** @var Category $category */
				$feedWriter->writeRaw($category->xmlSerialize());
			}
		}
		if ($this->getContributors()->count() > 0) {
			foreach ($this->getContributors() as $contributor) {
				/** @var Person $contributor */
				$contributor->setTagName('contributor');
				$feedWriter->writeRaw($contributor->xmlSerialize());
			}
		}
		if ($this->getGenerator() instanceof Generator)
			$feedWriter->writeRaw($this->getGenerator()->xmlSerialize());
		if ($this->getIcon() !== '')
			$feedWriter->writeElement('icon', $this->getIcon());
		if ($this->getLogo() !== '')
			$feedWriter->writeElement('logo', $this->getLogo());
		if ($this->getRights() instanceof Text) {
			$this->getRights()->setTagName('rights');
			$feedWriter->writeRaw($this->getRights()->xmlSerialize());
		}
		if ($this->getSubtitle() instanceof Text) {
			$this->getSubtitle()->setTagName('subtitle');
			$feedWriter->writeRaw($this->getSubtitle()->xmlSerialize());
		}

		if ($this->getEntries()->count() > 0) {
			foreach ($this->getEntries() as $entry) {
				/** @var Entry $entry */
				$feedWriter->writeRaw($entry->xmlSerialize());
			}
		}

		if ($this->getTagName() === 'feed') {
			$feedWriter->endElement();
		}
	}

}