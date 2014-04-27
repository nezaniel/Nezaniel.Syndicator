<?php
namespace Nezaniel\Syndicator\Core;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Nezaniel.Feeder".       *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * An interface to serialize to XML
 */
interface XmlSerializableInterface {

	public function xmlSerialize();

}