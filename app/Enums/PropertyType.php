<?php

namespace App\Enums;
enum PropertyType: int {
    case appartment = 1;
    case house = 2; 
    case office = 3;
    case shop = 4;
    case warehouse = 5;
    case land = 6;
    case other = 7;
}