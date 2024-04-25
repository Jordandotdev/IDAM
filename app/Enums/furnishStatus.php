<?php

namespace App\Enums;
enum FurnishStatus: int {
    case Furnished = 1;
    case Un_Furnished = 2;
    case Partly_Furnished = 3;
}