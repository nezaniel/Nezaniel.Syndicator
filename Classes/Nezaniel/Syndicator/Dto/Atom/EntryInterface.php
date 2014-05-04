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
 * An Atom Entry interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#entry
 */
interface EntryInterface {

	/**
	 * @return \Traversable<Person>
	 */
	public function getAuthors();

	/**
	 * @return \Traversable<Category>
	 */
	public function getCategories();

	/**
	 * @return Content
	 */
	public function getContent();

	/**
	 * @return \Traversable<Person>
	 */
	public function getContributors();

	/**
	 * @return string
	 */
	public function getId();

	/**
	 * @return \Traversable<Link>
	 */
	public function getLinks();

	/**
	 * @return \DateTime
	 */
	public function getPublished();

	/**
	 * @return Text
	 */
	public function getRights();

	/**
	 * @return Feed
	 */
	public function getSource();

	/**
	 * @return Text
	 */
	public function getSummary();

	/**
	 * @return Text
	 */
	public function getTitle();

	/**
	 * @return \DateTime
	 */
	public function getUpdated();

}