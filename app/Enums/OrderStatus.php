<?php

namespace App\Enums;

enum OrderStatus: int
{
    case CREATED = 1;
    case PROCESSED = 2;
    case SHIPPED = 3;
    case CANCELLED = 4;
}
