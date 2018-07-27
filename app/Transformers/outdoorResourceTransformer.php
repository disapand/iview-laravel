<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 9:11
 */
namespace App\Transformers;

use App\Models\outdoorResource;
use League\Fractal\TransformerAbstract;

class outdoorResourceTransformer extends TransformerAbstract {

    protected $availableIncludes = ['outdoorResourceImgs'];

    public function transform(outdoorResource $outdoor) {
        return [
            'id' => $outdoor->id,
            'city' => $outdoor->city,
            'form' => $outdoor->form,
            'unit_num' => $outdoor->unit_num,
            'language' => $outdoor->language,
            'category' => $outdoor->category,
            'property' => $outdoor->property,
            'SOV' => $outdoor->SOV,
            'visitor' => $outdoor->visitor,
            'traffic' => $outdoor->traffic,
            'minimum_buy' => $outdoor->minimum_buy,
            'format' => $outdoor->format,
            'number' => $outdoor->number,
            'time' => $outdoor->time,
            'media_price' => $outdoor->media_price,
            'price' => $outdoor->price,
            'total_num' => $outdoor->total_num,
            'company' => $outdoor->company,
            'contributor' => $outdoor->contributor,
            'detail' => $outdoor->detail,
            'country' => $outdoor->country,
            'name' => $outdoor->name,
            'requirements' => $outdoor->requirements,
            'isuse' => $outdoor->isuse,
            'created_at' => $outdoor->created_at ? $outdoor->created_at->toDateTimeString() : '',
            'updated_at' => $outdoor->updated_at ? $outdoor->updated_at->toDateTimeString() : '',
            'deleted_at' => $outdoor->deleted_at ? $outdoor->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeOutdoorResourceImgs(outdoorResource $outdoor) {
        return $this->collection($outdoor->outdoorResourceImgs, new outdoorResourceImgsTransformer());
    }

}