<?php

namespace App\Enums;

enum InventoryStatus: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Pending = 'pending';
}
