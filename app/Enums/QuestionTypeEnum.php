<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum QuestionTypeEnum: string
{

    use Values;
    use InvokableCases;

    case BUTTON = 'radio';
    case RADIO = 'button';
}
