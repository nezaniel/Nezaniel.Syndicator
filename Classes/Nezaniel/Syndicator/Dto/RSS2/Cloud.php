<?php
namespace Nezaniel\Syndicator\Dto\Rss2;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use Nezaniel\Syndicator\Core\XmlWriterSerializableInterface;

/**
 * An RSS cloud
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltcloudgtSubelementOfLtchannelgt
 * @see http://cyber.law.harvard.edu/rss/soapMeetsRss.html#rsscloudInterface
 */
class Cloud implements XmlWriterSerializableInterface {

	/**
	 * @var string
	 */
	protected $domain;

	/**
	 * @var integer
	 */
	protected $port;

	/**
	 * @var string
	 */
	protected $path;

	/**
	 * @var string
	 */
	protected $registerProcedure;

	/**
	 * @var string
	 */
	protected $protocol;


	/**
	 * @param $domain
	 * @param $port
	 * @param $path
	 * @param $registerProcedure
	 * @param $protocol
	 */
	public function __construct($domain, $port, $path, $registerProcedure, $protocol) {
		$this->domain = $domain;
		$this->port = $port;
		$this->path = $path;
		$this->registerProcedure = $registerProcedure;
		$this->protocol = $protocol;
	}


	/**
	 * @return string
	 */
	public function getDomain() {
		return $this->domain;
	}

	/**
	 * @return string
	 */
	public function getPath() {
		return $this->path;
	}

	/**
	 * @return int
	 */
	public function getPort() {
		return $this->port;
	}

	/**
	 * @return string
	 */
	public function getProtocol() {
		return $this->protocol;
	}

	/**
	 * @return string
	 */
	public function getRegisterProcedure() {
		return $this->registerProcedure;
	}


	/**
	 * @param \XMLWriter $feedWriter
	 * @param string $tagName
	 * @return void
	 */
	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName = 'cloud') {
		$feedWriter->startElement($tagName);

		$feedWriter->writeAttribute('domain', $this->getDomain());
		$feedWriter->writeAttribute('port', $this->getPort());
		$feedWriter->writeAttribute('path', $this->getPath());
		$feedWriter->writeAttribute('registerProcedure', $this->getRegisterProcedure());
		$feedWriter->writeAttribute('protocol', $this->getProtocol());

		$feedWriter->endElement();
	}

}