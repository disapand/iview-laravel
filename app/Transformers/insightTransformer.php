<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/8/10
 * Time: 19:49
 */

namespace App\Transformers;
use App\Models\insight;
use League\Fractal\TransformerAbstract;

class insightTransformer extends TransformerAbstract
{

    public function Transform(insight $insight) {
        return [
            'id' => $insight->id,
            'title' => $insight->title,
            'category' => $insight->category,
            'content' => $insight->content,
            'created_at' => $insight->created_at ? $insight->created_at->toDateTimeString(): '',
            'updated_at' => $insight->updated_at ? $insight->updated_at->toDateTimeString(): '',
            'deleted_at' => $insight->deleted_at ? $insight->deleted_at->toDateTimeString(): '',
        ];
    }

}