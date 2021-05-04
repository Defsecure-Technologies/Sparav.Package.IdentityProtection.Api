<?php


namespace Sparav\IdentityProtection\Enums;


use BenSampo\Enum\Enum;

final class HasBeenPwnedType extends Enum
{
    const Unknown = "0";
    const Pwned = "1";
    const NotPwned = "2";
}
