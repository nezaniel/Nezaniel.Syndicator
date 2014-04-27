<?php
namespace Nezaniel\Syndicator\Dto\Rss2;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Dto\AbstractXmlSerializableFeed;

/**
 * An RSS feed
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html
 */
class Feed extends AbstractXmlSerializableFeed {

	/**
	 * @var Channel
	 */
	protected $channel;


	/**
	 * @param Channel $channel
	 */
	public function __construct(Channel $channel) {
		$this->channel = $channel;
	}


	/**
	 * @return \Nezaniel\Syndicator\Dto\Rss2\Channel
	 */
	public function getChannel() {
		return $this->channel;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @return void
	 */
	public function xmlSerializeInternal(\XMLWriter $feedWriter) {
		$feedWriter->startElement('rss');
		$feedWriter->writeAttribute('version', '2.0');

		$this->channel->xmlSerializeUsingWriter($feedWriter);

		$feedWriter->endElement();
	}

}