<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/8/8
 * Time: 20:49
 */

namespace App\Transformers;
use App\Models\CaseResource;
use League\Fractal\TransformerAbstract;

class CaseResourceTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['imgs'];

    public function transform(CaseResource $caseResource) {
        return [
            'id' => $caseResource->id,
            'title' => $caseResource->title,
            'category' => $caseResource->category,
            'content' => $caseResource->content,
            'created_at' => $caseResource->created_at ? $caseResource->created_at->toDateTimeString() : '',
            'updated_at' => $caseResource->updated_at ? $caseResource->updated_at->toDateTimeString() : '',
            'deleted_at' => $caseResource->deleted_at ? $caseResource->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeImgs(CaseResource $caseResource) {
        return $this->collection($caseResource->imgs, new CaseImgTransformer());
    }
}