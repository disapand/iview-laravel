<?php
namespace App\Transforms;

use App\Models\oilCard;
use League\Fractal\TransformerAbstract;

class OilCardTransformer extends TransformerAbstract
{
    public function transform(oilCard $oilCard) {
        return  [
            'id' => $oilCard->id ? : '',
            'No' => $oilCard->No ? : '',
            'pws' => $oilCard->pwd ? : '',
            'car_id' => $oilCard->car_id ? : '',
            'created_at' => $oilCard->created_at ? $oilCard->created_at->toDateTimeString() : '',
            'updated_at' => $oilCard->updated_at ? $oilCard->updated_at->toDateTimeString() : '',
        ];
    }
}