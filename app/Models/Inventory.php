<?php

namespace App\Models;

use App\Enums\InventoryStatus;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    public function scopeActiveOrOnHold(Builder $query): void
    {
        $query->whereNot('status', InventoryStatus::Inactive);
    }
}
