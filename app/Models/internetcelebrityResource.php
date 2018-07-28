<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\internetcelebrityResource
 *
 * @property int $id
 * @property string $name KOL名称
 * @property string $platform 媒体内容属性类别
 * @property string|null $ad_form 广告形式
 * @property string|null $detail KOL特点
 * @property string $area 覆盖区域
 * @property string|null $language 语言
 * @property int $fans 粉丝数量最多的平台的粉丝量
 * @property string|null $media_price 媒体报价（美元）
 * @property string|null $price 执行价（美元）
 * @property string|null $company KOL所属公司或集团
 * @property string|null $contributor 媒介开发者
 * @property string|null $advantage 擅长的推广方式
 * @property string $country 国家或地区
 * @property string $cooperation 合作品牌
 * @property string|null $requirements 上刊要求
 * @property int $isuse 是否有效
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\internetcelebrityResourceImgs[] $internetcelerityResourcImgs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\internetcelebrityResourceCategory[] $internetcelerityResourceCategory
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResource onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereAdForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereAdvantage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereContributor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereCooperation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereFans($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereIsuse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereMediaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResource withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResource withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\internetcelebrityResourceImgs[] $internetcelebrityResourceImgs
 */
class internetcelebrityResource extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function Imgs() {
        return $this->hasMany(internetcelebrityResourceImgs::class, 'internetcelebrity_resources_id', 'id');
    }

    public function categories() {
        return $this->belongsToMany(internetcelebrityResourceCategory::class, 'category_internetcelerities',
            'internetcelebrity_resources_id', 'internetcelebrity_resources_category_id');
    }

}
