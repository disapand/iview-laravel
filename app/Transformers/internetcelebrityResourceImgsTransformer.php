<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 14:25
 */

namespace App\Transformers;
use App\Models\internetcelebrityResourceImgs;
use League\Fractal\TransformerAbstract;

class internetcelebrityResourceImgsTransformer extends TransformerAbstract
{

    public function transform(internetcelebrityResourceImgs $img) {
        return [
            'id' => $img->id,
            'internetcelebrity_resources_id' => $img->internetcelebrity_resources_id,
            'url' => $img->url,
            'created_at' => $img->created_at ? $img->created_at->toDateTimeString() : '',
            'updated_at' => $img->updated_at ? $img->updated_at->toDateTimeString() : '',
            'deleted_at' => $img->deleted_at ? $img->deleted_at->toDateTimeString() : '',
        ];
    }

}