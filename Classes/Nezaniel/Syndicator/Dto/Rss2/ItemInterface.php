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
 * An RSS2 Item interface
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#hrelementsOfLtitemgt
 */
interface ItemInterface {

	/**
	 * @return string
	 */
	public function getAuthor();

	/**
	 * @return \Traversable<Category>
	 */
	public function getCategories();

	/**
	 * @return string
	 */
	public function getComments();

	/**
	 * @return string
	 */
	public function getDescription();

	/**
	 * @return Enclosure
	 */
	public function getEnclosure();

	/**
	 * @return string
	 */
	public function getGuid();

	/**
	 * @return boolean
	 */
	public function getPermaLink();

	/**
	 * @return string
	 */
	public function getLink();

	/**
	 * @return \DateTime
	 */
	public function getPubDate();

	/**
	 * @return Source
	 */
	public function getSource();

	/**
	 * @return string
	 */
	public function getTitle();

}