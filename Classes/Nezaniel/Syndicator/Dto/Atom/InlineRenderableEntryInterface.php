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
 * The inline renderable variant of the Atom Entry interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#feed
 */
interface InlineRenderableEntryInterface {

	/**
	 * @return string
	 */
	public function getId();

	/**
	 * @return string
	 */
	public function renderTitle();

	/**
	 * @return \DateTime
	 */
	public function getUpdated();

	/**
	 * @return string
	 */
	public function renderAuthors();

	/**
	 * @return string
	 */
	public function renderContent();

	/**
	 * @return string
	 */
	public function renderLinks();

	/**
	 * @return string
	 */
	public function renderSummary();

	/**
	 * @return string
	 */
	public function renderCategories();

	/**
	 * @return string
	 */
	public function renderContributors();

	/**
	 * @return \DateTime
	 */
	public function getPublished();

	/**
	 * @return string
	 */
	public function renderSource();

	/**
	 * @return string
	 */
	public function renderRights();

}