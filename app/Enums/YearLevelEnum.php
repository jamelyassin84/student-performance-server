<?php

namespace App\Enums;


use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum YearLevelEnum: string
{
    use Values;
    use InvokableCases;

    case FIRST = '1st';
    case SECOND = '2nd';
    case THIRD = '3rd';
    case FOURTH = '4th';
    case FIFTH = '5th';
}
