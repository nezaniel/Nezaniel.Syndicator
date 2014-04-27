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
use Nezaniel\Syndicator\Dto\AbstractXmlSerializableFeed;
use TYPO3\Flow\Annotations as Flow;

/**
 * An Atom Feed
 *
 * @see http://www.atomenabled.org/developers/syndication/#feed
 */
class Feed extends AbstractXmlSerializableFeed {

	/**
	 * The feeded Node's uuid
	 * The Feed does not have an own one!
	 *
	 * @var string
	 */
	protected $nodeUuid;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	protected $title;

	/**
	 * @var \DateTime
	 */
	protected $updated;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Person>
	 */
	protected $authors;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Link
	 */
	protected $link;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Category>
	 */
	protected $categories;

	/**
	 * @var \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Person>
	 */
	protected $contributors;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Generator
	 */
	protected $generator;

	/**
	 * @var \TYPO3\Media\Domain\Model\Image
	 */
	protected $icon;

	/**
	 * @var \TYPO3\Media\Domain\Model\Image
	 */
	protected $logo;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	protected $rights;

	/**
	 * @var \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	protected $subtitle;

	/**
	 * @var \array<string>
	 */
	protected $additionalRequiredNamespaces;


	/**
	 * @param string $nodeUuid
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Text $title
	 * @param \DateTime $updated
	 * @param \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Person> $authors
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Link $link
	 * @param \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Category> $categories
	 * @param \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Person> $contributors
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Generator $generator
	 * @param \TYPO3\Media\Domain\Model\Image $icon
	 * @param \TYPO3\Media\Domain\Model\Image $logo
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Text $rights
	 * @param \Nezaniel\Syndicator\Domain\Model\Atom\Text $subtitle
	 * @param \array<string> $additionalRequiredNamespaces
	 * @todo handle items
	 */
	function __construct($nodeUuid, \Nezaniel\Syndicator\Domain\Model\Atom\Text $title, \DateTime $updated, \Doctrine\Common\Collections\Collection $authors = NULL, \Nezaniel\Syndicator\Domain\Model\Atom\Link $link = NULL, \Doctrine\Common\Collections\Collection $categories = NULL, \Doctrine\Common\Collections\Collection $contributors = NULL, \Nezaniel\Syndicator\Domain\Model\Atom\Generator $generator = NULL,  \TYPO3\Media\Domain\Model\Image $icon = NULL, \TYPO3\Media\Domain\Model\Image $logo = NULL, \Nezaniel\Syndicator\Domain\Model\Atom\Text $rights = NULL, \Nezaniel\Syndicator\Domain\Model\Atom\Text $subtitle = NULL, array $additionalRequiredNamespaces = array()) {
		$this->nodeUuid = $nodeUuid;
		$this->title = $title;
		$this->updated = $updated;
		$this->authors = $authors;
		$this->link = $link;
		$this->categories = $categories;
		$this->contributors = $contributors;
		$this->generator = $generator;
		$this->icon = $icon;
		$this->logo = $logo;
		$this->rights = $rights;
		$this->subtitle = $subtitle;
		$this->additionalRequiredNamespaces = $additionalRequiredNamespaces;
	}


	/**
	 * @return string
	 */
	public function getNodeUuid() {
		return $this->nodeUuid;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @return \DateTime
	 * @todo iterate over entries
	 */
	public function getUpdated() {
		return $this->updated;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Person>
	 */
	public function getAuthors() {
		return $this->authors;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Link>
	 */
	public function getLink() {
		return $this->link;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Person>
	 */
	public function getCategories() {
		return $this->categories;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection<\Nezaniel\Syndicator\Domain\Model\Atom\Person>
	 */
	public function getContributors() {
		return $this->contributors;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Generator
	 */
	public function getGenerator() {
		return $this->generator;
	}

	/**
	 * @return \TYPO3\Media\Domain\Model\Image
	 */
	public function getIcon() {
		return $this->icon;
	}

	/**
	 * @return \TYPO3\Media\Domain\Model\Image
	 */
	public function getLogo() {
		return $this->logo;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	public function getRights() {
		return $this->rights;
	}

	/**
	 * @return \Nezaniel\Syndicator\Domain\Model\Atom\Text
	 */
	public function getSubtitle() {
		return $this->subtitle;
	}

	/**
	 * @return \array<string>
	 */
	public function getAdditionalRequiredNamespaces() {
		return $this->additionalRequiredNamespaces;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 * @todo implement this
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {

	}

	/**
	 * @return string
	 */
	public function xml() {
		$feedWriter->startElement('feed');
		$feedWriter->writeAttribute('xmlns', 'http://www.w3.org/2005/Atom');
		foreach ($this->getAdditionalRequiredNamespaces() as $namespace => $uri) {
			$feedWriter->writeAttribute('xmlns:' . $namespace, $uri);
		}

		// Required
		$feedWriter->writeElement('id', 'urn:uuid:' . $this->getNodeUuid());
		$this->title->toXML($feedWriter, 'title');
		$feedWriter->writeElement('updated', $this->getUpdated()->format(\DateTime::ATOM));

		// Recommended
		if ($this->getAuthors() instanceof \Doctrine\Common\Collections\Collection && $this->getAuthors()->count() > 0) {
			foreach ($this->getAuthors() as $author) {
				$author->toXML($feedWriter, 'author');
			}
		}
		if ($this->getLink() instanceof Link) {
			$this->getLink()->toXML($feedWriter);
		}

		// Optional
		if ($this->getCategories() instanceof \Doctrine\Common\Collections\Collection && $this->getCategories()->count() > 0) {
			foreach ($this->getCategories() as $category) {
				$category->toXML($feedWriter);
			}
		}
		if ($this->getContributors() instanceof \Doctrine\Common\Collections\Collection && $this->getContributors()->count() > 0) {
			foreach ($this->getContributors() as $contributor) {
				$contributor->toXML($feedWriter, 'contributor');
			}
		}
		if ($this->getGenerator() instanceof Generator) {
			$this->getGenerator()->toXML($feedWriter);
		}
		if ($this->getIcon() instanceof \TYPO3\Media\Domain\Model\Image) {
			/** @todo use icon variant? */
			$feedWriter->writeElement('icon', $this->getIcon()->getResource()->getUri());
		}
		if ($this->getLogo() instanceof \TYPO3\Media\Domain\Model\Image) {
			/** @todo use logo variant? */
			$feedWriter->writeElement('logo', $this->getLogo()->getResource()->getUri());
		}
		if ($this->getRights() instanceof Text) {
			$this->getRights()->toXML($feedWriter, 'rights');
		}
		if ($this->getSubtitle() instanceof Text) {
			$this->getSubtitle()->toXML($feedWriter, 'subtitle');
		}

		// Extended

		$feedWriter->endElement();
		$feedWriter->endDocument();
		return $feedWriter->outputMemory();
	}

}