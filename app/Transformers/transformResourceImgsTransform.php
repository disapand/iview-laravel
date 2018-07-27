<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 11:04
 */

namespace App\Transformers;
use App\Models\transformResourceImg;
use League\Fractal\TransformerAbstract;

class transformResourceImgsTransform extends TransformerAbstract
{

    public function transform(transformResourceImg $img){
        return [
            'id' => $img->id,
            'transform_resources_id' => $img->transform_resources_id,
            'url' => $img->url,
            'created_at' => $img->created_at ? $img->created_at->toDateTimeString() : '',
            'updated_at' => $img->updated_at ? $img->updated_at->toDateTimeString() : '',
            'deleted_at' => $img->deleted_at ? $img->deleted_at->toDateTimeString() : '',
        ];
    }

}