<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/27
 * Time: 14:25
 */

namespace App\Transformers;
use App\Models\internetcelebrityResourceCategory;
use App\Models\internetcelebrityResourceImgs;
use League\Fractal\TransformerAbstract;

class internetcelebrityResourceCategoriesTransformer extends TransformerAbstract
{

    public function transform(internetcelebrityResourceCategory $category) {
        return [
            'id' => $category->id,
            'name' => $category->name,
            'created_at' => $category->created_at ? $category->created_at->toDateTimeString() : '',
            'updated_at' => $category->updated_at ? $category->updated_at->toDateTimeString() : '',
            'deleted_at' => $category->deleted_at ? $category->deleted_at->toDateTimeString() : '',
        ];
    }

}