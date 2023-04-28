<?php

namespace App\Domain\User\Enums;

enum Role: string
{
    case SYSTEM_ADMIN = "system_admin";
    case ADMIN = 'admin';
}
