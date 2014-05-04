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
 * An Atom Generator interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#feed
 */
interface GeneratorInterface {

	/**
	 * @return string
	 */
	public function getName();

	/**
	 * @return string
	 */
	public function getUri();

	/**
	 * @return string
	 */
	public function getVersion();

}