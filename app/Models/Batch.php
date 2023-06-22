<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Batch extends Model
{
    use HasFactory;

    public function product(): HasOne
    {
        return $this->hasOne(Product::class);
    }

    public function supplier(): HasOne
    {
        return $this->hasOne(Supplier::class);
    }
}
