<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/20
 * Time: 15:21
 */
namespace App\Transforms;

use App\Models\kzlx;
use League\Fractal\TransformerAbstract;

class kzlxTransformer extends TransformerAbstract {

    protected $availableIncludes = ['sqxm'];

    public function transform(kzlx $kzlx) {
        return [
          'id' => $kzlx->id,
          'category' => $kzlx->category,
          'created_at' => $kzlx->created_at ? $kzlx->created_at->toDateTimeString() : '',
          'updated_at' => $kzlx->updated_at ? $kzlx->updated_at->toDateTimeString() : '',
          'deleted_at' => $kzlx->deleted_at ? $kzlx->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeSqxm() {

    }

}