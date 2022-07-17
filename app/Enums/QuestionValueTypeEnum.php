<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum QuestionValueTypeEnum: string
{
    use Values;
    use InvokableCases;

    case POSITIVE = 'positive';
    case NEGATIVE = 'negative';
}
