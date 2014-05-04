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
 * An Atom Text interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#text
 */
interface TextInterface {

	const TYPE_TEXT = 'text';
	const TYPE_HTML = 'html';
	const TYPE_XHTML = 'xhtml';

	/**
	 * @return string
	 */
	public function getType();

	/**
	 * @return string
	 */
	public function getContent();

}