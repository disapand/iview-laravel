<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/8/8
 * Time: 20:52
 */

namespace App\Transformers;
use App\Models\CaseImg;
use League\Fractal\TransformerAbstract;

class CaseImgTransformer extends TransformerAbstract
{
    public function transform(CaseImg $img) {
        return [
            'id' => $img->id,
            'category' => $img->category,
            'case_resources_id' => $img->case_resources_id,
            'url' => $img->url,
            'created_at' => $img->created_at ? $img->created_at->toDateTimeString() : '',
            'updated_at' => $img->updated_at ? $img->updated_at->toDateTimeString() : '',
            'deleted_at' => $img->deleted_at ? $img->deleted_at->toDateTimeString() : '',
        ];
    }
}