<?php
/*
 * This file is part of the PHPASN1 library.
 *
 * Copyright © Friedrich Große <friedrich.grosse@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FGR\ASN1\Composite;

use FGR\ASN1\Universal\PrintableString;
use FGR\ASN1\Universal\IA5String;
use FGR\ASN1\Universal\UTF8String;

class RDNString extends RelativeDistinguishedName
{
    /**
     * @param string|\FGR\ASN1\Universal\ObjectIdentifier $objectIdentifierString
     * @param string|\FGR\ASN1\ASNObject $value
     */
    public function __construct($objectIdentifierString, $value)
    {
        if (PrintableString::isValid($value)) {
            $value = new PrintableString($value);
        } else {
            if (IA5String::isValid($value)) {
                $value = new IA5String($value);
            } else {
                $value = new UTF8String($value);
            }
        }

        parent::__construct($objectIdentifierString, $value);
    }
}
