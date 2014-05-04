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
 * An Atom Link interface
 *
 * @see http://www.atomenabled.org/developers/syndication/#link
 */
interface LinkInterface {

	/**
	 * An alternate representation of the entry or feed, for example a permalink to the html version of the entry, or the front page of the weblog.
	 */
	const REL_ALTERNATE = 'alternate';

	/**
	 * A related resource which is potentially large in size and might require special handling, for example an audio or video recording.
	 */
	const REL_ENCLOSURE = 'enclosure';

	/**
	 * A document related to the entry or feed.
	 */
	const REL_RELATED = 'related';

	/**
	 * The feed itself.
	 */
	const REL_SELF = 'self';

	/**
	 * The source of the information provided in the entry.
	 */
	const REL_VIA = 'via';


	/**
	 * @return string
	 */
	public function getHref();

	/**
	 * @return string
	 */
	public function getRel();

	/**
	 * @return string
	 */
	public function getType();

	/**
	 * @return string
	 */
	public function getHreflang();

	/**
	 * @return string
	 */
	public function getTitle();

	/**
	 * @return integer
	 */
	public function getLength();

}