<?php

namespace App\Transformers;

use App\Models\televisionResourcesImg;
use League\Fractal\TransformerAbstract;

class televisionResourcesImgTransformer extends TransformerAbstract
{

//    protected $availableIncludes = ['televisionResources'];

    public function transform(televisionResourcesImg $img) {
        return [
            'id' => $img->id,
            'television_resources_id' => $img->television_resources_id,
            'url' => $img->url,
            'created_at' => $img->created_at ? $img->created_at->toDateTimeString() : '',
            'updated_at' => $img->updated_at? $img->updated_at->toDateTimeString()  : '',
        ];
    }

//    public function includeTelevisionResources(televisionResourcesImg $img) {
//        return $this->item($img->televisionResources, new televisionResourcesTransformer());
//    }

}