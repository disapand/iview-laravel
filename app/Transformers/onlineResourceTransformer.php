<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 21:13
 */

namespace App\Transformers;
use App\Models\onlineResource;
use League\Fractal\TransformerAbstract;

class onlineResourceTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['onlineResourceImgs'];

    public function transform(onlineResource $online) {
        return [
            'id' => $online->id,
            'name' => $online->name,
            'category' => $online->category,
            'form' => $online->form,
            'detail' => $online->detail,
            'area' => $online->area,
            'language' => $online->language,
            'platform' => $online->platform,
            'company' => $online->company,
            'pv' => $online->pv,
            'uv' => $online->uv,
            'minimum_buy' => $online->minimum_buy,
            'format' => $online->format,
            'media_price' => $online->media_price,
            'price' => $online->price,
            'contributor' => $online->contributor,
            'link' => $online->link,
            'country' => $online->country,
            'requirements' => $online->requirements,
            'isuse' => $online->isuse ? true : false,
            'created_at' => $online->created_at ? $online->created_at->toDateTimeString() : '',
            'updated_at' => $online->created_at ? $online->updated_at->toDateTimeString() : '',
            'deleted_at' => $online->deleted_at ? $online->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeOnlineResourceImgs(onlineResource $online) {
        return $this->collection($online->onlineResourceImgs, new onlineResourceImgsTransfomer());
    }

}