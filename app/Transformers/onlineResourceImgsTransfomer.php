<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 21:14
 */

namespace App\Transformers;
use App\Models\onlineResourceImgs;
use League\Fractal\TransformerAbstract;

class onlineResourceImgsTransfomer extends TransformerAbstract
{

    public function transform(onlineResourceImgs $imgs) {
        return [
            'id' => $imgs->id,
            'online_resources_id' => $imgs->online_resources_id,
            'url' => $imgs->url,
            'created_at' => $imgs->created_at ? $imgs->created_at->toDateTimeString() : '',
            'updated_at' => $imgs->created_at ? $imgs->updated_at->toDateTimeString() : '',
            'deleted_at' => $imgs->deleted_at ? $imgs->deleted_at->toDateTimeString() : '',
        ];
    }

}