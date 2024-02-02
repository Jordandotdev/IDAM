<?php

namespace App\Enums;

enum Role : int {
    case SuperAdmin = 0;
    case Admin = 1;
    case Customer = 2;
    case PropertyOwner = 3;
    case Guest = 4;
}