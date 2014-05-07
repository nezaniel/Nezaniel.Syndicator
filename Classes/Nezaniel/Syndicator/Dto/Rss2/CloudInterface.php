<?php
namespace Nezaniel\Syndicator\Dto\Rss2;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */

/**
 * An RSS2 Cloud interface
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltcloudgtSubelementOfLtchannelgt
 * @see http://cyber.law.harvard.edu/rss/soapMeetsRss.html#rsscloudInterface
 */
interface CloudInterface {

	/**
	 * @return string
	 */
	public function getDomain();

	/**
	 * @return string
	 */
	public function getPath();

	/**
	 * @return integer
	 */
	public function getPort();

	/**
	 * @return string
	 */
	public function getProtocol();

	/**
	 * @return string
	 */
	public function getRegisterProcedure();

}