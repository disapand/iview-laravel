<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 9:21
 */

namespace App\Transformers;
use App\Models\outdoorResourceImgs;
use League\Fractal\TransformerAbstract;

class outdoorResourceImgsTransformer extends TransformerAbstract
{
    public function transform(outdoorResourceImgs $imgs) {
       return [
           'id' => $imgs->id,
           'outdoor_resources_id' => $imgs->outdoor_resources_id,
           'url' => $imgs->url,
           'created_at' => $imgs->created_at ? $imgs->created_at->toDateTimeString() : '',
           'updated_at' => $imgs->updated_at ? $imgs->updated_at->toDateTimeString() : '',
           'deleted_at' => $imgs->deleted_at ? $imgs->deleted_at->toDateTimeString() : '',
       ];
    }
}