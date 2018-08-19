<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018-08-19
 * Time: 8:42
 */

namespace App\Transformers;

use App\Models\dynamicImg;
use League\Fractal\TransformerAbstract;

class dynamicImgTransformer extends TransformerAbstract
{
    public function transform(dynamicImg $img)
    {
        return [
            'id' => $img->id,
            'dynamic_id' => $img->dynamic_id,
            'url' => $img->url,
            'created_at' => $img->created_at ? $img->created_at->toDateTimeString() : '',
            'updated_at' => $img->updated_at ? $img->updated_at->toDateTimeString() : '',
            'deleted_at' => $img->deleted_at ? $img->deleted_at->toDateTimeString() : '',
        ];
    }
}