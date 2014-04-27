<?php
namespace Nezaniel\Syndicator\Dto\Rss2\Exception;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Nezaniel.Feeder".       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */
use Nezaniel\Syndicator\Dto\Exception;

/**
 * A "Missing Item Description" exception
 */
class MissingItemDescriptionException extends Exception {

	/**
	 * @var integer
	 */
	protected $statusCode = 500;

}