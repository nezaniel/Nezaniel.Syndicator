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
 * An RSS channel interface
 *
 * @see http://cyber.law.harvard.edu/rss/rss.html#requiredChannelElements
 */
interface ChannelInterface {

	/**
	 * @return \Traversable<Category>
	 */
	public function getCategories();

	/**
	 * @return Cloud
	 */
	public function getCloud();

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
	 * @return Image
	 */
	public function getImage();

	/**
	 * @return \Traversable<Item>
	 */
	public function getItems();

	/**
	 * @return string
	 */
	public function getLanguage();

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
	 * @return TextInput
	 */
	public function getTextInput();

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
	public function getAtomLink();

}