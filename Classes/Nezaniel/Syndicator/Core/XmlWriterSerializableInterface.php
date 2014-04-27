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
 * An interface to serialize using \XMLWriter
 *
 * @see http://php.net/manual/de/book.xmlwriter.php
 */
interface XmlWriterSerializableInterface {

	public function xmlSerializeUsingWriter(\XMLWriter $feedWriter, $tagName);

}