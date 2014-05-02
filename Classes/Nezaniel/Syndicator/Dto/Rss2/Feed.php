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

/**
 * An RSS feed
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html
 */
class Feed extends AbstractXmlWriterSerializable {

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
	 * @return Channel
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
		$feedWriter->writeAttribute('xmlns:atom', 'http://www.w3.org/2005/Atom');

		$feedWriter->writeRaw($this->channel->xmlSerialize());

		$feedWriter->endElement();
	}

}