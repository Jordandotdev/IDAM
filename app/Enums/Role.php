<?php

namespace App\Enums;

enum Role : int {
    case SuperAdmin = 1;
    case Admin = 2;
    case Customer = 3;
    case PropertyOwner = 4;
    case Guest = 5;
}