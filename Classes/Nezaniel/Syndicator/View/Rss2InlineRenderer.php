<?php
namespace Nezaniel\Syndicator\View;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Core\Syndicator;
use Nezaniel\Syndicator\Dto\Atom\LinkInterface;
use Nezaniel\Syndicator\Dto\Rss2 as Rss2;

/**
 * An XML renderer for RSS2 feeds with inline child constructs
 */
class Rss2InlineRenderer {

	/**
	 * @param Rss2\InlineRenderableFeedInterface $feed
	 * @return string
	 */
	public function renderFeed(Rss2\InlineRenderableFeedInterface $feed) {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);

		$feedWriter->startElement('rss');

		$feedWriter->writeAttribute('version', '2.0');
		$feedWriter->writeAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom');

		$feedWriter->writeRaw($feed->renderChannel());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\InlineRenderableChannelInterface $channel
	 * @param string                $tagName
	 * @return string
	 */
	public function renderChannel(Rss2\InlineRenderableChannelInterface $channel, $tagName = 'channel') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$feedWriter->startElement($tagName);

		$feedWriter->writeElement('title', $channel->getTitle());
		$feedWriter->writeElement('link', $channel->getLink());
		$feedWriter->writeElement('description', $channel->getDescription());

		if ($channel->getLanguage() !== '')
			$feedWriter->writeElement('language', $channel->getLanguage());
		if ($channel->getCopyright() !== '')
			$feedWriter->writeElement('copyright', $channel->getCopyright());
		if ($channel->getManagingEditor() !== '')
			$feedWriter->writeElement('managingEditor', $channel->getManagingEditor());
		if ($channel->getWebMaster() !== '')
			$feedWriter->writeElement('webMaster', $channel->getWebMaster());
		if ($channel->getPubDate() instanceof \DateTime)
			$feedWriter->writeElement('pubDate', $channel->getPubDate()->format(\DateTime::RSS));

		$now = new \DateTime();
		$feedWriter->writeElement('lastBuildDate', $now->format(\DateTime::RSS));

		$feedWriter->writeRaw($channel->renderCategories());

		if ($channel->getGenerator() !== '')
			$feedWriter->writeElement('generator', $channel->getGenerator());
		if ($channel->getDocs() !== '')
			$feedWriter->writeElement('docs', $channel->getDocs());
		$feedWriter->writeRaw($channel->renderCloud());
		if ($channel->getTtl() !== NULL)
			$feedWriter->writeElement('ttl', $channel->getTtl());
		$feedWriter->writeRaw($channel->renderImage());
		if ($channel->getRating() !== '')
			$feedWriter->writeElement('rating', $channel->getRating());
		$feedWriter->writeRaw($channel->renderTextInput());

		if (sizeof($channel->getSkipHours()) > 0) {
			$feedWriter->startElement('skipHours');
			foreach ($channel->getSkipHours() as $hourToSkip) {
				$feedWriter->writeElement('hour', $hourToSkip);
			}
			$feedWriter->endElement();
		}

		if (sizeof($channel->getSkipDays()) > 0) {
			$feedWriter->startElement('skipDays');
			foreach ($channel->getSkipDays() as $dayToSkip) {
				$feedWriter->writeElement('day', $dayToSkip);
			}
			$feedWriter->endElement();
		}

		if ($channel->getAtomLink() !== '') {
			$feedWriter->startElement('atom:link');
			$feedWriter->writeAttribute('href', $channel->getAtomLink());
			$feedWriter->writeAttribute('rel', LinkInterface::REL_SELF);
			$feedWriter->writeAttribute('type', Syndicator::CONTENTTYPE_RSS2);
			$feedWriter->endElement();
		}

		$feedWriter->writeRaw($channel->renderItems());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\CategoryInterface $category
	 * @param string                 $tagName
	 * @return string
	 */
	public function renderCategory(Rss2\CategoryInterface $category, $tagName = 'category') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$feedWriter->startElement($tagName);

		if (($domain = $category->getDomain()) !== '') {
			$feedWriter->writeAttribute('domain', $domain);
		}
		$feedWriter->writeRaw($category->getName());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\CloudInterface $cloud
	 * @param string              $tagName
	 * @return string
	 */
	public function renderCloud(Rss2\CloudInterface $cloud, $tagName = 'cloud') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('domain', $cloud->getDomain());
		$feedWriter->writeAttribute('port', $cloud->getPort());
		$feedWriter->writeAttribute('path', $cloud->getPath());
		$feedWriter->writeAttribute('registerProcedure', $cloud->getRegisterProcedure());
		$feedWriter->writeAttribute('protocol', $cloud->getProtocol());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\ImageInterface $image
	 * @param string              $tagName
	 * @return string
	 */
	public function renderImage(Rss2\ImageInterface $image, $tagName = 'image') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$feedWriter->startElement($tagName);

		$feedWriter->writeElement('url', $image->getUrl());
		$feedWriter->writeElement('title', $image->getTitle());
		$feedWriter->writeElement('link', $image->getLink());

		if ($image->getWidth() !== NULL) {
			$feedWriter->writeElement('width', $image->getWidth());
		}
		if ($image->getHeight() !== NULL) {
			$feedWriter->writeElement('height', $image->getHeight());
		}
		if ($image->getDescription() !== '') {
			$feedWriter->writeElement('description', $image->getDescription());
		}

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\TextInputInterface $textInput
	 * @param string                  $tagName
	 * @return string
	 */
	public function renderTextInput(Rss2\TextInputInterface $textInput, $tagName = 'textInput') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$feedWriter->startElement($tagName);

		$feedWriter->writeElement('title', $textInput->getTitle());
		$feedWriter->writeElement('description', $textInput->getDescription());
		$feedWriter->writeElement('name', $textInput->getName());
		$feedWriter->writeElement('link', $textInput->getLink());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\InlineRenderableItemInterface $item
	 * @param string                             $tagName
	 * @return string
	 */
	public function renderItem(Rss2\InlineRenderableItemInterface $item, $tagName = 'item') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$feedWriter->startElement($tagName);

		if ($item->getTitle() !== '')
			$feedWriter->writeElement('title', $item->getTitle());
		if ($item->getLink() !== '')
			$feedWriter->writeElement('link', $item->getLink());
		if ($item->getDescription() !== '')  {
			$feedWriter->startElement('description');
			$feedWriter->writeCdata($item->getDescription());
			$feedWriter->endElement();
		}
		if ($item->getAuthor() !== '')
			$feedWriter->writeElement('author', $item->getAuthor());
		$feedWriter->writeRaw($item->renderCategories());
		if ($item->getComments() !== '')
			$feedWriter->writeElement('comments', $item->getComments());
		$feedWriter->writeRaw($item->renderEnclosure());
		if ($item->getGuid() !== '') {
			$feedWriter->startElement('guid');
			$feedWriter->writeAttribute('isPermaLink', $item->getPermaLink()?'true':'false');
			$feedWriter->writeRaw($item->getGuid());
			$feedWriter->endElement();
		}
		if ($item->getPubDate() instanceof \DateTime)
			$feedWriter->writeElement('pubDate', $item->getPubDate()->format(\DateTime::RSS));
		$feedWriter->writeRaw($item->renderSource());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\EnclosureInterface $enclosure
	 * @param string                  $tagName
	 * @return string
	 */
	public function renderEnclosure(Rss2\EnclosureInterface $enclosure, $tagName = 'enclosure') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('url', $enclosure->getUrl());
		$feedWriter->writeAttribute('length', $enclosure->getLength());
		$feedWriter->writeAttribute('type', $enclosure->getType());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\SourceInterface $source
	 * @param string               $tagName
	 * @return string
	 */
	public function renderSource(Rss2\SourceInterface $source, $tagName = 'source') {
		$feedWriter = new \XMLWriter();
		$feedWriter->openMemory();
		$feedWriter->setIndent(FALSE);
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('url', $source->getUrl());
		$feedWriter->writeRaw($source->getName());

		$feedWriter->endElement();

		return $feedWriter->outputMemory();
	}

}