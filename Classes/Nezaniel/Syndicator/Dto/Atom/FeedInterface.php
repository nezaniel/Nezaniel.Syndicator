<?php
namespace Nezaniel\Syndicator\Dto\Atom;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */

/**
 * An Atom Feed interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#feed
 */
interface FeedInterface {

	/**
	 * @return \Traversable<PersonInterface>
	 */
	public function getAuthors();

	/**
	 * @return \Traversable<CategoryInterface>
	 */
	public function getCategories();

	/**
	 * @return \Traversable<PersonInterface>
	 */
	public function getContributors();

	/**
	 * @return \Traversable<EntryInterface>
	 */
	public function getEntries();

	/**
	 * @return Generator
	 */
	public function getGenerator();

	/**
	 * @return string
	 */
	public function getIcon();

	/**
	 * @return string
	 */
	public function getId();

	/**
	 * @return \Traversable<LinkInterface>
	 */
	public function getLinks();

	/**
	 * @return string
	 */
	public function getLogo();

	/**
	 * @return Text
	 */
	public function getRights();

	/**
	 * @return Text
	 */
	public function getSubtitle();

	/**
	 * @return Text
	 */
	public function getTitle();

	/**
	 * @return \DateTime
	 */
	public function getUpdated();

}