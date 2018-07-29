<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 14:24
 */

namespace App\Transformers;

use App\Models\newspaperResource;
use League\Fractal\TransformerAbstract;

class newspaperResourceTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['newspaperResourceImgs'];

    public function transform(newspaperResource $newspaper)
    {
        return [
            'id' => $newspaper->id,
            'name' => $newspaper->name,
            'form' => $newspaper->form,
            'ad_form' => $newspaper->ad_form,
            'detail' => $newspaper->detail,
            'area' => $newspaper->area,
            'language' => $newspaper->language,
            'category' => $newspaper->category,
            'minimum_buy' => $newspaper->minimum_buy,
            'format' => $newspaper->format,
            'cycle' => $newspaper->cycle,
            'media_price' => $newspaper->media_price,
            'price' => $newspaper->price,
            'circulation' => $newspaper->circulation,
            'page' => $newspaper->page,
            'country' => $newspaper->country,
            'version' => $newspaper->version,
            'company' => $newspaper->company,
            'contributor' => $newspaper->contributor,
            'requirements' => $newspaper->requirements,
            'isuse' => $newspaper->isuse ? true : false,
            'created_at' => $newspaper->created_at ? $newspaper->created_at->toDateTimeString() : '',
            'updated_at' => $newspaper->updated_at ? $newspaper->updated_at->toDateTimeString() : '',
            'deleted_at' => $newspaper->deleted_at ? $newspaper->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeNewspaperResourceImgs(newspaperResource $newspaper)
    {
        return $this->collection($newspaper->newspaperResourceImgs, new newspaperResourceImgsTransformer());
    }

}