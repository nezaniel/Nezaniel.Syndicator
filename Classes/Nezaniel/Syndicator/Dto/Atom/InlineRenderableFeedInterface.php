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
 * The inline renderable variant of the Atom Feed interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#feed
 */
interface InlineRenderableFeedInterface {

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
	public function renderLinks();

	/**
	 * @return string
	 */
	public function renderCategories();

	/**
	 * @return string
	 */
	public function renderContributors();

	/**
	 * @return string
	 */
	public function renderGenerator();

	/**
	 * @return string
	 */
	public function getIcon();

	/**
	 * @return string
	 */
	public function getLogo();

	/**
	 * @return string
	 */
	public function renderRights();

	/**
	 * @return string
	 */
	public function renderSubtitle();

	/**
	 * @return string
	 */
	public function renderEntries();

}