<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/8/10
 * Time: 19:52
 */

namespace App\Transformers;


use App\Models\dynamic;
use League\Fractal\TransformerAbstract;

class dynamicTransformer extends TransformerAbstract
{
    public function transform(dynamic $dynamic) {
        return [
            'id' => $dynamic->id,
            'title' => $dynamic->title,
            'tag' => $dynamic->tag,
            'content' => $dynamic->content,
            'created_at' => $dynamic->created_at ? $dynamic->created_at->toDateTimeString(): '',
            'updated_at' => $dynamic->updated_at ? $dynamic->updated_at->toDateTimeString(): '',
            'deleted_at' => $dynamic->deleted_at ? $dynamic->deleted_at->toDateTimeString(): '',
        ];
    }
}