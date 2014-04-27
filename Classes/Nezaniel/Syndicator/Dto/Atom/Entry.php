<?php
namespace Nezaniel\Syndicator\Dto\Atom;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Core\XmlWriterSerializableInterface;

/**
 * An Atom entry construct
 *
 * @see http://www.atomenabled.org/developers/syndication/#entry
 */
class Entry implements XmlWriterSerializableInterface {

	/* Required elements */
	/**
	 * @var string
	 */
	protected $id;

	/**
	 * @var string
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
	 * @var Content
	 */
	protected $content;

	/**
	 * @var \SplObjectStorage<Link>
	 */
	protected $links;

	/**
	 * @var Text
	 */
	protected $summary;


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
	 * @var \DateTime
	 */
	protected $published;

	/**
	 * @var Feed
	 */
	protected $source;

	/**
	 * @var Text
	 */
	protected $rights;


	/**
	 * @param string            $id
	 * @param string            $title
	 * @param \DateTime         $updated
	 * @param \SplObjectStorage $authors
	 * @param Content           $content
	 * @param \SplObjectStorage $links
	 * @param Text              $summary
	 * @param \SplObjectStorage $categories
	 * @param \SplObjectStorage $contributors
	 * @param \DateTime         $published
	 * @param Feed              $source
	 * @param Text              $rights
	 */
	public function __construct($id, $title, \DateTime $updated,
		\SplObjectStorage $authors = NULL, Content $content = NULL, \SplObjectStorage $links = NULL, Text $summary = NULL,
		\SplObjectStorage $categories = NULL, \SplObjectStorage $contributors = NULL, \DateTime $published = NULL, Feed $source = NULL, Text $rights = NULL) {

			$this->id = $id;
			$this->title = $title;
			$this->updated = $updated;

			$this->authors = ($authors !== NULL ? $authors : new \SplObjectStorage());
			$this->content = $content;
			$this->links = ($links !== NULL ? $links : new \SplObjectStorage());
			$this->summary = $summary;

			$this->categories = ($categories !== NULL ? $categories : new \SplObjectStorage());
			$this->contributors = ($contributors !== NULL ? $contributors : new \SplObjectStorage());
			$this->published = $published;
			$this->source = $source;
			$this->rights = $rights;
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
	 * @return \SplObjectStorage<Category>
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
	 * @param Content $content
	 * @return void
	 */
	public function setContent(Content $content) {
		$this->content = $content;
	}

	/**
	 * @return Content
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * @param \SplObjectStorage $contributors
	 * @return void
	 */
	public function setContributors(\SplObjectStorage $contributors) {
		$this->contributors = $contributors;
	}

	/**
	 * @return \SplObjectStorage<Person>
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
	 * @return \SplObjectStorage<Link>
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
	 * @param \DateTime $published
	 * @return void
	 */
	public function setPublished(\DateTime $published) {
		$this->published = $published;
	}

	/**
	 * @return \DateTime
	 */
	public function getPublished() {
		return $this->published;
	}

	/**
	 * @param Text $rights
	 * @return void
	 */
	public function setRights($rights) {
		$this->rights = $rights;
	}

	/**
	 * @return Text
	 */
	public function getRights() {
		return $this->rights;
	}

	/**
	 * @param Feed $source
	 * @return void
	 */
	public function setSource(Feed $source) {
		$this->source = $source;
	}

	/**
	 * @return Feed
	 */
	public function getSource() {
		return $this->source;
	}

	/**
	 * @param Text $summary
	 * @return void
	 */
	public function setSummary(Text $summary) {
		$this->summary = $summary;
	}

	/**
	 * @return Text
	 */
	public function getSummary() {
		return $this->summary;
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
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'entry') {
		$feedWriter->startElement($tagName);

		$feedWriter->writeElement('id', $this->getId());
		$feedWriter->writeElement('title', $this->getTitle());
		$feedWriter->writeElement('updated', $this->getUpdated()->format(\DateTime::ATOM));

		if ($this->getAuthors()->count() > 0) {
			foreach ($this->getAuthors() as $author) {
				/** @var Person $author */
				$author->xmlSerializeUsingWriter($feedWriter, 'author');
			}
		}
		if ($this->getContent() instanceof Content)
			$this->getContent()->xmlSerializeUsingWriter($feedWriter, 'content');
		if ($this->getLinks()->count() > 0) {
			foreach ($this->getLinks() as $link) {
				/** @var Link $link */
				$link->xmlSerializeUsingWriter($feedWriter);
			}
		}
		if ($this->getSummary() instanceof Text)
			$this->getSummary()->xmlSerializeUsingWriter($feedWriter, 'summary');

		if ($this->getCategories()->count() > 0) {
			foreach ($this->getCategories() as $category) {
				/** @var Category $category */
				$category->xmlSerializeUsingWriter($feedWriter);
			}
		}
		if ($this->getContributors()->count() > 0) {
			foreach ($this->getContributors() as $contributor) {
				/** @var Person $contributor */
				$contributor->xmlSerializeUsingWriter($feedWriter, 'contributor');
			}
		}
		if ($this->getPublished() instanceof \DateTime)
			$feedWriter->writeElement('published', $this->getPublished()->format(\DateTime::ATOM));
		if ($this->getSource() instanceof Feed)
			$this->getSource()->xmlSerializeUsingWriter($feedWriter, 'source');
		if ($this->getRights() instanceof Text)
			$this->getRights()->xmlSerializeUsingWriter($feedWriter, 'rights');

		$feedWriter->endElement();
	}

}