<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\oilCard
 *
 * @mixin \Eloquent
 */
class oilCard extends Model
{
    protected $fillable = [
        'No', 'pwd', 'car_id'
    ];

    public function car() {
        return $this->belongsTo(Car::class, 'car_id', 'id')->withDefault();
    }

}
