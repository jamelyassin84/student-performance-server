<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum SemesterEnum: string
{
    use Values;
    use InvokableCases;

    case FIRST = '1st';
    case SECOND = '2nd';
    case THIRD = '3rd';
}
