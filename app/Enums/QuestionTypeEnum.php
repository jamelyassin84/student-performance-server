<?php

namespace App\Enums;


enum QuestionTypeEnum: string
{
    case BUTTON = 'radio';
    case RADIO = 'button';
}
