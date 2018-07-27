<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Car
 *
 * @property int $id
 * @property string $car_id 车牌号
 * @property string $model 车型
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Car whereCarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Car whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Car whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Car whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Car whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\Models\oilCard $oilCard
 */
class Car extends Model
{
    protected $fillable = [
        'car_id', 'model'
    ];

    public function oilCard() {
        return $this->hasOne(oilCard::class, 'car_id', 'id')->withDefault();
    }

}