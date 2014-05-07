<?php
namespace Nezaniel\Syndicator\View;

/*                                                                        *
 * This script belongs to the composer package "Nezaniel.Syndicator".     *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        */

/**
 * An XML renderer for feeds
 */
abstract class AbstractFeedRenderer {

	/**
	 * @var \XMLWriter
	 */
	protected $feedWriter;


	/**
	 *
	 */
	public function __construct() {
		$this->feedWriter = new \XMLWriter();
	}

}