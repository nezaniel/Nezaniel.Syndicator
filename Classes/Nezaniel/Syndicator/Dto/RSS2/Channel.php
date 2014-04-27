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
use TYPO3\Flow\Annotations as Flow;

/**
 * An RSS channel
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#requiredChannelElements
 */
class Channel implements XmlWriterSerializableInterface {

	/**
	 * @var array
	 */
	protected $items;


	/**
	 * @param ArrayCollection $items
	 */
	public function __construct(ArrayCollection $items) {
		$this->items = $items->toArray();
	}


	/**
	 * @return Item[]
	 */
	public function getItems() {
		return $this->items;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'channel') {
		$feedWriter->startElement($tagName);

		if (sizeof($this->getItems()) > 0) {
			foreach ($this->getItems() as $item) {
				$item->xmlSerialize($feedWriter);
			}
		}

		$feedWriter->endElement();
	}

}