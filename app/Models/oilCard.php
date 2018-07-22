<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\oilCard
 *
 * @mixin \Eloquent
 * @property int $id
 * @property int $No
 * @property int|null $pwd
 * @property int $car_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\Car $car
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\oilCard whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\oilCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\oilCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\oilCard whereNo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\oilCard wherePwd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\oilCard whereUpdatedAt($value)
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
