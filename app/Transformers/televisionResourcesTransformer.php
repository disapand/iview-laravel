<?php

namespace App\Transformers;

use App\Models\televisionResources;
use League\Fractal\TransformerAbstract;

class televisionResourcesTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['televisionResourcesImgs'];

    public function transform(televisionResources $tv) {
        return [
            'id' => $tv->id,
            'channel' => $tv->channel,
            'form' => $tv->form,
            'detail' => $tv->detail,
            'area' => $tv->area,
            'language' => $tv->language,
            'category' => $tv->category,
            'station' => $tv->station,
            'minimum_buy' => $tv->minimum_buy,
            'time' => $tv->time,
            'company' => $tv->company,
            'contributor' => $tv->contributor,
            'price' => $tv->price,
            'country' => $tv->country,
            'program' => $tv->program,
            'requirements' => $tv->requirements,
            'isuse' => $tv->isuse ? true : false,
            'created_at' => $tv->created_at ? $tv->created_at->toDateTimeString() : '',
            'updated_at' => $tv->updated_at ? $tv->updated_at->toDateTimeString() : '',
            'deleted_at' => $tv->deleted_at ? $tv->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeTelevisionResourcesImgs(televisionResources $tv) {
        return $this->collection($tv->televisionResourcesImgs, new televisionResourcesImgTransformer());
    }

}