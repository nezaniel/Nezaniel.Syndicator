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
 * The inline renderable variant of the RSS2 channel interface
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#requiredChannelElements
 */
interface InlineRenderableChannelInterface {

	/**
	 * @return string
	 */
	public function renderCategories();

	/**
	 * @return string
	 */
	public function renderCloud();

	/**
	 * @return string
	 */
	public function getCopyright();

	/**
	 * @return string
	 */
	public function getDescription();

	/**
	 * @return string
	 */
	public function getDocs();

	/**
	 * @return string
	 */
	public function getGenerator();

	/**
	 * @return string
	 */
	public function renderImage();

	/**
	 * @return string
	 */
	public function renderItems();

	/**
	 * @return string
	 */
	public function getLanguage();

	/**
	 * @return \DateTime
	 */
	public function getLastBuildDate();

	/**
	 * @return string
	 */
	public function getLink();

	/**
	 * @return string
	 */
	public function getManagingEditor();

	/**
	 * @return \DateTime
	 */
	public function getPubDate();

	/**
	 * @return string
	 */
	public function getRating();

	/**
	 * @return array
	 */
	public function getSkipDays();

	/**
	 * @return array
	 */
	public function getSkipHours();

	/**
	 * @return string
	 */
	public function renderTextInput();

	/**
	 * @return string
	 */
	public function getTitle();

	/**
	 * @return integer
	 */
	public function getTtl();

	/**
	 * @return string
	 */
	public function getWebMaster();

	/**
	 * @return string
	 */
	public function getAtomLinkUrl();

}