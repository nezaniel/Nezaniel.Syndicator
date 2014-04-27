<?php
namespace Nezaniel\Syndicator\Core;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */

/**
 * A container class for information about this package
 */
abstract class Syndicator {

	const VERSION = '0.1.0';

	const FORMAT_RSS2 = 'rss2';
	const FORMAT_ATOM = 'atom';

	const CONTENTTYPE_RSS2 = 'application/rss+xml';
	const CONTENTTYPE_ATOM = 'application/atom+xml';

}