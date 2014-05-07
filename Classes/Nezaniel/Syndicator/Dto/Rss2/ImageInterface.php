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
 * An RSS channel Image interface
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#ltimagegtSubelementOfLtchannelgt
 */
interface ImageInterface {

	/**
	 * @return string
	 */
	public function getDescription();

	/**
	 * @return integer
	 */
	public function getHeight();

	/**
	 * @return string
	 */
	public function getLink();

	/**
	 * @return string
	 */
	public function getTitle();

	/**
	 * @return string
	 */
	public function getUrl();

	/**
	 * @return integer
	 */
	public function getWidth();

}