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
 * An XML renderer for Atom feeds with inline child constructs
 */
class AtomInlineRenderer {

	const FEEDMODE_FEED = 'feed';
	const FEEDMODE_SOURCE = 'source';

	/**
	 * @param Atom\InlineRenderableFeedInterface $feed
	 * @param string                             $feedMode
	 * @return string
	 */
	public function renderFeed(Atom\InlineRenderableFeedInterface $feed, $feedMode = self::FEEDMODE_FEED) {
		if ($feedMode !== self::FEEDMODE_FEED && $feedMode !== self::FEEDMODE_SOURCE) {
			return '';
		}
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement($feedMode);

		if ($feedMode === self::FEEDMODE_FEED) {
			$feedWriter->writeAttribute('xmlns', 'http://www.w3.org/2005/Atom');
		}

		if ($feed->getId() !== NULL) {
			$feedWriter->writeElement('id', $feed->getId());
		}

		$feedWriter->writeRaw($feed->renderTitle());

		if ($feed->getUpdated() instanceof \DateTime) {
			$feedWriter->writeElement('updated', $feed->getUpdated()->format(\DateTime::ATOM));
		}

		$feedWriter->writeRaw($feed->renderAuthors());
		$feedWriter->writeRaw($feed->renderLinks());
		$feedWriter->writeRaw($feed->renderCategories());
		$feedWriter->writeRaw($feed->renderContributors());
		$feedWriter->writeRaw($feed->renderGenerator());

		if (($icon = $feed->getIcon()) !== '')
			$feedWriter->writeElement('icon', $icon);
		if (($logo = $feed->getLogo()) !== '')
			$feedWriter->writeElement('logo', $logo);

		$feedWriter->writeRaw($feed->renderRights());
		$feedWriter->writeRaw($feed->renderSubtitle());
		if ($feedMode === self::FEEDMODE_FEED)
			$feedWriter->writeRaw($feed->renderEntries());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Atom\TextInterface $text
	 * @param string             $tagName
	 * @return string
	 */
	public function renderText(Atom\TextInterface $text, $tagName) {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('type', $text->getType());
		$feedWriter->writeRaw($text->getContent());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Atom\PersonInterface $person
	 * @param string               $tagName
	 * @return string
	 */
	public function renderPerson(Atom\PersonInterface $person, $tagName) {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement($tagName);

		$feedWriter->writeElement('name', $person->getName());
		if ($person->getUri() !== NULL) {
			$feedWriter->writeElement('uri', $person->getUri());
		}
		if ($person->getEmail() !== NULL) {
			$feedWriter->writeElement('email', $person->getEmail());
		}

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Atom\LinkInterface $link
	 * @param string             $tagName
	 * @return string
	 */
	public function renderLink(Atom\LinkInterface $link, $tagName = 'link') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('href', $link->getHref());
		if ($link->getRel() !== '')
			$feedWriter->writeAttribute('rel', $link->getRel());
		if ($link->getType() !== '')
			$feedWriter->writeAttribute('type', $link->getType());
		if ($link->getHreflang() !== '')
			$feedWriter->writeAttribute('hreflang', $link->getHreflang());
		if ($link->getTitle() !== '')
			$feedWriter->writeAttribute('title', $link->getTitle());
		if ($link->getLength() !== NULL)
			$feedWriter->writeAttribute('length', $link->getLength());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Atom\CategoryInterface $category
	 * @param string                 $tagName
	 * @return string
	 */
	public function renderCategory(Atom\CategoryInterface $category, $tagName = 'category') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('term', $category->getTerm());
		if ($category->getScheme() !== '')
			$feedWriter->writeAttribute('scheme', $category->getScheme());
		if ($category->getLabel() !== '')
			$feedWriter->writeAttribute('label', $category->getLabel());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Atom\GeneratorInterface $generator
	 * @param string                  $tagName
	 * @return string
	 */
	public function renderGenerator(Atom\GeneratorInterface $generator, $tagName = 'generator') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement($tagName);

		if ($generator->getUri() !== '')
			$feedWriter->writeAttribute('uri', $generator->getUri());
		if ($generator->getVersion() !== '')
			$feedWriter->writeAttribute('version', $generator->getVersion());
		$feedWriter->writeRaw($generator->getName());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Atom\InlineRenderableEntryInterface $entry
	 * @param string              $tagName
	 * @return string
	 */
	public function renderEntry(Atom\InlineRenderableEntryInterface $entry, $tagName = 'entry') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement($tagName);

		if (($id = $entry->getId()) !== NULL) {
			$feedWriter->writeElement('id', $entry->getId());
		}

		$feedWriter->writeRaw($entry->renderTitle());

		if ($entry->getUpdated() instanceof \DateTime) {
			$feedWriter->writeElement('updated', $entry->getUpdated()->format(\DateTime::ATOM));
		}

		$feedWriter->writeRaw($entry->renderAuthors());
		$feedWriter->writeRaw($entry->renderContent());
		$feedWriter->writeRaw($entry->renderLinks());
		$feedWriter->writeRaw($entry->renderSummary());
		$feedWriter->writeRaw($entry->renderCategories());
		$feedWriter->writeRaw($entry->renderContributors());

		if ($entry->getPublished() instanceof \DateTime) {
			$feedWriter->writeElement('published', $entry->getPublished()->format(\DateTime::ATOM));
		}

		$feedWriter->writeRaw($entry->renderSource());
		$feedWriter->writeRaw($entry->renderRights());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Atom\ContentInterface $content
	 * @param string                $tagName
	 * @return string
	 */
	public function renderContent(Atom\ContentInterface $content, $tagName = 'content') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('type', $content->getType());
		if ($content->getSrc() !== '')
			$feedWriter->writeAttribute('src', $content->getSrc());
		$feedWriter->writeRaw($content->getContent());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

}