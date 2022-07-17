<?php

namespace App\Enums;

use ArchTech\Enums\InvokableCases;
use ArchTech\Enums\Values;

enum UserEnum: string
{
    use Values;
    use InvokableCases;


    case STUDENT = 'Student';
    case ADMIN = 'Admin';
}
