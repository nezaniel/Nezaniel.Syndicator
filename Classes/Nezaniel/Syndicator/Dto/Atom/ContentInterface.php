<?php
namespace Nezaniel\Syndicator\Dto\Atom;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */
use TYPO3\Flow\Annotations as Flow;

/**
 * An Atom Content interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#contentElement
 */
interface ContentInterface extends TextInterface {

	/**
	 * @return string
	 */
	public function getSrc();

}