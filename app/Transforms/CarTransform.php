<?php

namespace App\Transforms;

use App\Models\Car;
use League\Fractal\TransformerAbstract;

class CarTransform extends TransformerAbstract
{

    protected $availableIncludes = ['oilCard'];

    public function transform(Car $car)
    {
        return [
            'car_id' => $car->car_id,
            'model' => $car->model,
            'created_at' => $car->created_at ? $car->created_at->toDateTimeString() : '',
            'updated_at' => $car->updated_at ? $car->updated_at->toDateTimeString() : '',
        ];
    }

    public function includeOilCard(Car $car) {
        return $this->item($car->oilCard, new OilCardTransformer());
    }

}