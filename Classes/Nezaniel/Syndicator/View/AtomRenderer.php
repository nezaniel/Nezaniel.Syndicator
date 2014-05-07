<?php
namespace Nezaniel\Syndicator\View;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Dto\Atom as Atom;

/**
 * An XML renderer for Atom constructs
 */
class AtomRenderer extends AbstractFeedRenderer {


	/**
	 * @param Atom\FeedInterface $feed
	 * @param string             $tagName
	 * @return string
	 */
	public function renderFeed(Atom\FeedInterface $feed, $tagName = 'feed') {
		$this->feedWriter->openMemory();
		$this->feedWriter->setIndent(FALSE);

		$this->feedWriter->startElement($tagName);

		if ($tagName === 'feed') {
			$this->feedWriter->writeAttribute('xmlns', 'http://www.w3.org/2005/Atom');
		}

		if ($feed->getId() !== NULL) {
			$this->feedWriter->writeElement('id', $feed->getId());
		}
		if ($feed->getTitle() instanceof Atom\Text) {
			$this->renderText($feed->getTitle(), 'title');
		}
		if ($feed->getUpdated() instanceof \DateTime) {
			$this->feedWriter->writeElement('updated', $feed->getUpdated()->format(\DateTime::ATOM));
		}

		if (sizeof($feed->getAuthors()) > 0) {
			foreach ($feed->getAuthors() as $author) {
				if ($author instanceof Atom\PersonInterface) {
					$this->renderPerson($author, 'author');
				}
			}
		}

		if (sizeof($feed->getLinks()) > 0) {
			foreach ($feed->getLinks() as $link) {
				if ($link instanceof Atom\LinkInterface) {
					$this->renderLink($link);
				}
			}
		}

		if (sizeof($feed->getCategories()) > 0) {
			foreach ($feed->getCategories() as $category) {
				if ($category instanceof Atom\CategoryInterface) {
					$this->renderCategory($category);
				}
			}
		}

		if (sizeof($feed->getContributors()) > 0) {
			foreach ($feed->getContributors() as $contributor) {
				if ($contributor instanceof Atom\PersonInterface) {
					$this->renderPerson($contributor, 'contributor');
				}
			}
		}

		if ($feed->getGenerator() instanceof Atom\GeneratorInterface) {
			$this->renderGenerator($feed->getGenerator());
		}

		if ($feed->getIcon() !== '')
			$this->feedWriter->writeElement('icon', $feed->getIcon());
		if ($feed->getLogo() !== '')
			$this->feedWriter->writeElement('logo', $feed->getLogo());

		if ($feed->getRights() instanceof Atom\TextInterface) {
			$this->renderText($feed->getRights(), 'rights');
		}
		if ($feed->getSubtitle() instanceof Atom\TextInterface) {
			$this->renderText($feed->getSubtitle(), 'subtitle');
		}

		if ($tagName === 'feed' && sizeof($feed->getEntries()) > 0) {
			foreach ($feed->getEntries() as $entry) {
				if ($entry instanceof Atom\EntryInterface) {
					$this->renderEntry($entry);
				}
			}
		}

		$this->feedWriter->endElement();

		return $this->feedWriter->outputMemory();
	}

	/**
	 * @param Atom\TextInterface $text
	 * @param string             $tagName
	 * @return void
	 */
	public function renderText(Atom\TextInterface $text, $tagName) {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeAttribute('type', $text->getType());
		$this->feedWriter->writeRaw($text->getContent());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Atom\PersonInterface $person
	 * @param string               $tagName
	 * @return void
	 */
	public function renderPerson(Atom\PersonInterface $person, $tagName) {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeElement('name', $person->getName());
		if ($person->getUri() !== NULL) {
			$this->feedWriter->writeElement('uri', $person->getUri());
		}
		if ($person->getEmail() !== NULL) {
			$this->feedWriter->writeElement('email', $person->getEmail());
		}

		$this->feedWriter->endElement();
	}

	/**
	 * @param Atom\LinkInterface $link
	 * @param string             $tagName
	 * @return void
	 */
	public function renderLink(Atom\LinkInterface $link, $tagName = 'link') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeAttribute('href', $link->getHref());
		if ($link->getRel() !== '')
			$this->feedWriter->writeAttribute('rel', $link->getRel());
		if ($link->getType() !== '')
			$this->feedWriter->writeAttribute('type', $link->getType());
		if ($link->getHreflang() !== '')
			$this->feedWriter->writeAttribute('hreflang', $link->getHreflang());
		if ($link->getTitle() !== '')
			$this->feedWriter->writeAttribute('title', $link->getTitle());
		if ($link->getLength() !== NULL)
			$this->feedWriter->writeAttribute('length', $link->getLength());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Atom\CategoryInterface $category
	 * @param string                 $tagName
	 * @return void
	 */
	public function renderCategory(Atom\CategoryInterface $category, $tagName = 'category') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeAttribute('term', $category->getTerm());
		if ($category->getScheme() !== '')
			$this->feedWriter->writeAttribute('scheme', $category->getScheme());
		if ($category->getLabel() !== '')
			$this->feedWriter->writeAttribute('label', $category->getLabel());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Atom\GeneratorInterface $generator
	 * @param string                  $tagName
	 * @return void
	 */
	public function renderGenerator(Atom\GeneratorInterface $generator, $tagName = 'generator') {
		$this->feedWriter->startElement($tagName);

		if ($generator->getUri() !== '')
			$this->feedWriter->writeAttribute('uri', $generator->getUri());
		if ($generator->getVersion() !== '')
			$this->feedWriter->writeAttribute('version', $generator->getVersion());
		$this->feedWriter->writeRaw($generator->getName());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Atom\EntryInterface $entry
	 * @param string              $tagName
	 * @return void
	 */
	public function renderEntry(Atom\EntryInterface $entry, $tagName = 'entry') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeElement('id', $entry->getId());
		if ($entry->getTitle() instanceof Atom\TextInterface) {
			$this->renderText($entry->getTitle(), 'title');
		}
		if ($entry->getUpdated() instanceof \DateTime) {
			$this->feedWriter->writeElement('updated', $entry->getUpdated()->format(\DateTime::ATOM));
		}

		if (sizeof ($entry->getAuthors()) > 0) {
			foreach ($entry->getAuthors() as $author) {
				if ($author instanceof Atom\PersonInterface) {
					$this->renderPerson($author, 'author');
				}
			}
		}

		if ($entry->getContent() instanceof Atom\ContentInterface) {
			$this->renderContent($entry->getContent());
		}

		if (sizeof($entry->getLinks()) > 0) {
			foreach ($entry->getLinks() as $link) {
				if ($link instanceof Atom\LinkInterface) {
					$this->renderLink($link);
				}
			}
		}

		if ($entry->getSummary() instanceof Atom\TextInterface) {
			$this->renderText($entry->getSummary(), 'summary');
		}

		if (sizeof($entry->getCategories()) > 0) {
			foreach ($entry->getCategories() as $category) {
				if ($category instanceof Atom\CategoryInterface) {
					$this->renderCategory($category);
				}
			}
		}

		if (sizeof($entry->getContributors()) > 0) {
			foreach ($entry->getContributors() as $contributor) {
				if ($contributor instanceof Atom\PersonInterface) {
					$this->renderPerson($contributor, 'contributor');
				}
			}
		}

		if ($entry->getPublished() instanceof \DateTime)
			$this->feedWriter->writeElement('published', $entry->getPublished()->format(\DateTime::ATOM));
		if ($entry->getSource() instanceof Atom\FeedInterface) {
			$this->renderFeed($entry->getSource(), 'source');
		}
		if ($entry->getRights() instanceof Atom\TextInterface) {
			$this->renderText($entry->getRights(), 'rights');
		}

		$this->feedWriter->endElement();
	}

	/**
	 * @param Atom\ContentInterface $content
	 * @param string                $tagName
	 * @return void
	 */
	public function renderContent(Atom\ContentInterface $content, $tagName = 'content') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeAttribute('type', $content->getType());
		if ($content->getSrc() !== '')
			$this->feedWriter->writeAttribute('src', $content->getSrc());
		$this->feedWriter->writeRaw($content->getContent());

		$this->feedWriter->endElement();
	}

}