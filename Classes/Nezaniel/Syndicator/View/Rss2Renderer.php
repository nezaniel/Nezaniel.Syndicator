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
 * An XML renderer for RSS2 constructs
 */
class Rss2Renderer extends AbstractFeedRenderer {

	/**
	 * @param Rss2\FeedInterface $feed
	 * @return string
	 */
	public function renderFeed(Rss2\FeedInterface $feed) {
		$this->feedWriter->openMemory();
		$this->feedWriter->setIndent(FALSE);

		$this->feedWriter->startElement('rss');

		$this->feedWriter->writeAttribute('version', '2.0');
		$this->feedWriter->writeAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom');

		$this->renderChannel($feed->getChannel());

		$this->feedWriter->endElement();

		return $this->feedWriter->outputMemory();
	}

	/**
	 * @param Rss2\ChannelInterface $channel
	 * @param string                $tagName
	 * @return void
	 */
	public function renderChannel(Rss2\ChannelInterface $channel, $tagName = 'channel') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeElement('title', $channel->getTitle());
		$this->feedWriter->writeElement('link', $channel->getLink());
		$this->feedWriter->writeElement('description', $channel->getDescription());

		if ($channel->getLanguage() !== '')
			$this->feedWriter->writeElement('language', $channel->getLanguage());
		if ($channel->getCopyright() !== '')
			$this->feedWriter->writeElement('copyright', $channel->getCopyright());
		if ($channel->getManagingEditor() !== '')
			$this->feedWriter->writeElement('managingEditor', $channel->getManagingEditor());
		if ($channel->getWebMaster() !== '')
			$this->feedWriter->writeElement('webMaster', $channel->getWebMaster());
		if ($channel->getPubDate() instanceof \DateTime)
			$this->feedWriter->writeElement('pubDate', $channel->getPubDate()->format(\DateTime::RSS));

		$now = new \DateTime();
		$this->feedWriter->writeElement('lastBuildDate', $now->format(\DateTime::RSS));

		if (sizeof($channel->getCategories()) > 0) {
			foreach ($channel->getCategories() as $category) {
				if ($category instanceof Rss2\CategoryInterface) {
					$this->renderCategory($category);
				}
			}
		}

		if ($channel->getGenerator() !== '')
			$this->feedWriter->writeElement('generator', $channel->getGenerator());
		if ($channel->getDocs() !== '')
			$this->feedWriter->writeElement('docs', $channel->getDocs());
		if ($channel->getCloud() instanceof Rss2\CloudInterface)
			$this->renderCloud($channel->getCloud());
		if ($channel->getTtl() !== NULL)
			$this->feedWriter->writeElement('ttl', $channel->getTtl());
		if ($channel->getImage() instanceof Rss2\ImageInterface)
			$this->renderImage($channel->getImage());
		if ($channel->getRating() !== '')
			$this->feedWriter->writeElement('rating', $channel->getRating());
		if ($channel->getTextInput() instanceof Rss2\TextInputInterface)
			$this->renderTextInput($channel->getTextInput());

		if (sizeof($channel->getSkipHours()) > 0) {
			$this->feedWriter->startElement('skipHours');
			foreach ($channel->getSkipHours() as $hourToSkip) {
				$this->feedWriter->writeElement('hour', $hourToSkip);
			}
			$this->feedWriter->endElement();
		}

		if (sizeof($channel->getSkipDays()) > 0) {
			$this->feedWriter->startElement('skipDays');
			foreach ($channel->getSkipDays() as $dayToSkip) {
				$this->feedWriter->writeElement('day', $dayToSkip);
			}
			$this->feedWriter->endElement();
		}

		if ($channel->getAtomLink() !== '') {
			$this->feedWriter->startElement('atom:link');
			$this->feedWriter->writeAttribute('href', $channel->getAtomLink());
			$this->feedWriter->writeAttribute('rel', LinkInterface::REL_SELF);
			$this->feedWriter->writeAttribute('type', Syndicator::CONTENTTYPE_RSS2);
			$this->feedWriter->endElement();
		}

		if (sizeof($channel->getItems()) > 0) {
			foreach ($channel->getItems() as $item) {
				if ($item instanceof Rss2\ItemInterface) {
					$this->renderItem($item);
				}
			}
		}

		$this->feedWriter->endElement();
	}

	/**
	 * @param Rss2\CategoryInterface $category
	 * @param string                 $tagName
	 * @return void
	 */
	public function renderCategory(Rss2\CategoryInterface $category, $tagName = 'category') {
		$this->feedWriter->startElement($tagName);

		if (($domain = $category->getDomain()) !== '') {
			$this->feedWriter->writeAttribute('domain', $domain);
		}
		$this->feedWriter->writeRaw($category->getName());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Rss2\CloudInterface $cloud
	 * @param string              $tagName
	 * @return void
	 */
	public function renderCloud(Rss2\CloudInterface $cloud, $tagName = 'cloud') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeAttribute('domain', $cloud->getDomain());
		$this->feedWriter->writeAttribute('port', $cloud->getPort());
		$this->feedWriter->writeAttribute('path', $cloud->getPath());
		$this->feedWriter->writeAttribute('registerProcedure', $cloud->getRegisterProcedure());
		$this->feedWriter->writeAttribute('protocol', $cloud->getProtocol());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Rss2\ImageInterface $image
	 * @param string              $tagName
	 * @return void
	 */
	public function renderImage(Rss2\ImageInterface $image, $tagName = 'image') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeElement('url', $image->getUrl());
		$this->feedWriter->writeElement('title', $image->getTitle());
		$this->feedWriter->writeElement('link', $image->getLink());

		if ($image->getWidth() !== NULL) {
			$this->feedWriter->writeElement('width', $image->getWidth());
		}
		if ($image->getHeight() !== NULL) {
			$this->feedWriter->writeElement('height', $image->getHeight());
		}
		if ($image->getDescription() !== '') {
			$this->feedWriter->writeElement('description', $image->getDescription());
		}

		$this->feedWriter->endElement();
	}

	/**
	 * @param Rss2\TextInputInterface $textInput
	 * @param string                  $tagName
	 * @return void
	 */
	public function renderTextInput(Rss2\TextInputInterface $textInput, $tagName = 'textInput') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeElement('title', $textInput->getTitle());
		$this->feedWriter->writeElement('description', $textInput->getDescription());
		$this->feedWriter->writeElement('name', $textInput->getName());
		$this->feedWriter->writeElement('link', $textInput->getLink());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Rss2\ItemInterface $item
	 * @param string             $tagName
	 * @return void
	 */
	public function renderItem(Rss2\ItemInterface $item, $tagName = 'item') {
		$this->feedWriter->startElement($tagName);

		if ($item->getTitle() !== '')
			$this->feedWriter->writeElement('title', $item->getTitle());
		if ($item->getLink() !== '')
			$this->feedWriter->writeElement('link', $item->getLink());
		if ($item->getDescription() !== '')  {
			$this->feedWriter->startElement('description');
			$this->feedWriter->writeCdata($item->getDescription());
			$this->feedWriter->endElement();
		}
		if ($item->getAuthor() !== '')
			$this->feedWriter->writeElement('author', $item->getAuthor());
		if (sizeof($item->getCategories()) > 0) {
			foreach ($item->getCategories() as $category) {
				if ($category instanceof Rss2\CategoryInterface) {
					$this->renderCategory($category);
				}
			}
		}
		if ($item->getComments() !== '')
			$this->feedWriter->writeElement('comments', $item->getComments());
		if ($item->getEnclosure() instanceof Rss2\EnclosureInterface)
			$this->renderEnclosure($item->getEnclosure());
		if ($item->getGuid() !== '') {
			$this->feedWriter->startElement('guid');
			$this->feedWriter->writeAttribute('isPermaLink', $item->getPermaLink()?'true':'false');
			$this->feedWriter->writeRaw($item->getGuid());
			$this->feedWriter->endElement();
		}
		if ($item->getPubDate() instanceof \DateTime)
			$this->feedWriter->writeElement('pubDate', $item->getPubDate()->format(\DateTime::RSS));
		if ($item->getSource() instanceof Rss2\SourceInterface)
			$this->renderSource($item->getSource());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Rss2\EnclosureInterface $enclosure
	 * @param string                  $tagName
	 * @return void
	 */
	public function renderEnclosure(Rss2\EnclosureInterface $enclosure, $tagName = 'enclosure') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeAttribute('url', $enclosure->getUrl());
		$this->feedWriter->writeAttribute('length', $enclosure->getLength());
		$this->feedWriter->writeAttribute('type', $enclosure->getType());

		$this->feedWriter->endElement();
	}

	/**
	 * @param Rss2\SourceInterface $source
	 * @param string               $tagName
	 * @return void
	 */
	public function renderSource(Rss2\SourceInterface $source, $tagName = 'source') {
		$this->feedWriter->startElement($tagName);

		$this->feedWriter->writeAttribute('url', $source->getUrl());
		$this->feedWriter->writeRaw($source->getName());

		$this->feedWriter->endElement();
	}

}