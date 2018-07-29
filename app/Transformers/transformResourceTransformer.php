<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 10:49
 */

namespace App\Transformers;

use App\Models\transformResource;
use League\Fractal\TransformerAbstract;

class transformResourceTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['transformResourceImgs'];

    public function transform(transformResource $transform) {
        return [
            'id' => $transform->id,
            'city' => $transform->city,
            'form' => $transform->form,
            'unit_num' => $transform->unit_num,
            'position' => $transform->position,
            'language' => $transform->language,
            'category' => $transform->category,
            'area' => $transform->area,
            'SOV' => $transform->SOV,
            'visitor' => $transform->visitor,
            'traffic' => $transform->traffic,
            'minimum_buy' => $transform->minimum_buy,
            'format' => $transform->format,
            'number' => $transform->number,
            'time' => $transform->time,
            'media_price' => $transform->media_price,
            'price' => $transform->price,
            'total_num' => $transform->total_num,
            'company' => $transform->company,
            'contributor' => $transform->contributor,
            'detail' => $transform->detail,
            'country' => $transform->country,
            'name' => $transform->name,
            'requirements' => $transform->requirements,
            'isuse' => $transform->isuse ? true : false,
            'created_at' => $transform->created_at ? $transform->created_at->toDateTimeString() : '',
            'updated_at' => $transform->updated_at ? $transform->updated_at->toDateTimeString() : '',
            'deleted_at' => $transform->deleted_at ? $transform->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeTransformResourceImgs(transformResource $transform) {
        return $this->collection($transform->transformResourceImgs, new transformResourceImgsTransform());
    }

}