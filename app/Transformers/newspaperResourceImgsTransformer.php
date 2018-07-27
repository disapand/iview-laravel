<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 14:25
 */

namespace App\Transformers;
use App\Models\newspaperResourceImg;
use League\Fractal\TransformerAbstract;

class newspaperResourceImgsTransformer extends TransformerAbstract
{

    public function transform(newspaperResourceImg $img) {
        return [
            'id' => $img->id,
            'newspaper_resources_id' => $img->newspaper_resources_id,
            'url' => $img->url,
            'created_at' => $img->created_at ? $img->created_at->toDateTimeString() : '',
            'updated_at' => $img->updated_at ? $img->updated_at->toDateTimeString() : '',
            'deleted_at' => $img->deleted_at ? $img->deleted_at->toDateTimeString() : '',
        ];
    }

}