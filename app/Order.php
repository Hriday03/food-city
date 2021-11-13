<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //active course check
    const ACTIVE = 1;
    const IN_ACTIVE = 0;

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
    }
}
