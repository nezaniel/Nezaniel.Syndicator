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
 * The inline renderable variant of the RSS2 Item interface
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#hrelementsOfLtitemgt
 */
interface InlineRenderableItemInterface {

	/**
	 * @return string
	 */
	public function getAuthor();

	/**
	 * @return string
	 */
	public function renderCategories();

	/**
	 * @return string
	 */
	public function getComments();

	/**
	 * @return string
	 */
	public function getDescription();

	/**
	 * @return string
	 */
	public function renderEnclosure();

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
	 * @return string
	 */
	public function renderSource();

	/**
	 * @return string
	 */
	public function getTitle();

}