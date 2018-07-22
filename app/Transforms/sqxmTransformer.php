<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/20
 * Time: 15:15
 */

namespace App\Transforms;

use App\Models\sqxm;
use League\Fractal\TransformerAbstract;

class sqxmTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['kzlx'];

    public function transform(sqxm $sqxm)
    {
        return [
            'id' => $sqxm->id,
            'name' => $sqxm->name,
            'range' => $sqxm->range,
            'expanded' => $sqxm->expanded,
            'updated_at' => $sqxm->updated_at ? $sqxm->updated_at->toDateTimeString() : '',
            'created_at' => $sqxm->created_at ? $sqxm->created_at->toDateTimeString() : '',
            'deleted_at' => $sqxm->deleted_at ? $sqxm->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeKzlx(sqxm $sqxm) {
        return $this->collection($sqxm->kzlx, new kzlxTransformer());
    }

}

