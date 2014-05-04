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
 * An Atom Category interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#category
 */
interface CategoryInterface {

	/**
	 * @return string
	 */
	public function getTerm();

	/**
	 * @return string
	 */
	public function getScheme();

	/**
	 * @return string
	 */
	public function getLabel();

}