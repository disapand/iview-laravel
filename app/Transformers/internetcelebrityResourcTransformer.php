<?php
/**
 * Created by PhpStorm.
 * User: shado
 * Date: 2018/7/28
 * Time: 19:52
 */

namespace App\Transformers;
use App\Models\internetcelebrityResource;
use League\Fractal\TransformerAbstract;

class internetcelebrityResourcTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['categories'];
    protected $availableIncludes = ['Imgs'];

    public function transform(internetcelebrityResource $internetcelebrity) {
        return [
            'id' => $internetcelebrity->id,
            'name' => $internetcelebrity->name,
            'platform' => $internetcelebrity->platform,
            'ad_form' => $internetcelebrity->ad_form,
            'detail' => $internetcelebrity->detail,
            'area' => $internetcelebrity->area,
            'language' => $internetcelebrity->language,
            'fans' => $internetcelebrity->fans,
            'media_price' => $internetcelebrity->media_price,
            'price' => $internetcelebrity->price,
            'company' => $internetcelebrity->company,
            'contributor' => $internetcelebrity->contributor,
            'advantage' => $internetcelebrity->advantage,
            'country' => $internetcelebrity->country,
            'cooperation' => $internetcelebrity->cooperation,
            'requirements' => $internetcelebrity->requirements,
            'isuse' => $internetcelebrity->isuse,
            'created_at' => $internetcelebrity->created_at ? $internetcelebrity->created_at->toDateTimeString() : '',
            'updated_at' => $internetcelebrity->updated_at ? $internetcelebrity->updated_at->toDateTimeString() : '',
            'deleted_at' => $internetcelebrity->deleted_at ? $internetcelebrity->deleted_at->toDateTimeString() : '',
        ];
    }

    public function includeCategories(internetcelebrityResource $internetcelebrity) {
        return $this->collection($internetcelebrity->categories,
            new internetcelebrityResourceCategoriesTransformer());
    }

    public function includeImgs(internetcelebrityResource $internetcelebrity) {
        return $this->collection($internetcelebrity->Imgs,
            new internetcelebrityResourceImgsTransformer());
    }

}