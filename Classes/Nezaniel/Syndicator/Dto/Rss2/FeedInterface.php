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
 * An RSS Feed interface
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html
 */
interface FeedInterface {

	/**
	 * @return Channel
	 */
	public function getChannel();

}