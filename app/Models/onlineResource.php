<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\onlineResource
 *
 * @property int $id
 * @property string $name 媒体名称
 * @property string $category 类别
 * @property string $form 形式
 * @property string|null $detail 内容和特点
 * @property string $area 覆盖区域
 * @property string|null $language 语言
 * @property string $platform 媒体内容属性类别
 * @property string|null $company 媒体所属公司或集团
 * @property int|null $pv 网站月度PV
 * @property int|null $uv 网站月度UV
 * @property int|null $minimum_buy 最小投放预算或最小投放周期
 * @property string|null $format 尺寸
 * @property string|null $media_price 媒体报价（美元）
 * @property string|null $price 执行价（美元）
 * @property string|null $contributor 媒介开发者
 * @property string|null $link 网站链接
 * @property string $country 国家或地区
 * @property string|null $requirements 上刊要求
 * @property int $isuse 是否有效
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\onlineResourceImgs[] $onlineResourceImgs
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResource onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereContributor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereIsuse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereMediaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereMinimumBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource wherePv($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResource whereUv($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResource withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResource withoutTrashed()
 * @mixin \Eloquent
 */
class onlineResource extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function onlineResourceImgs() {
        return $this->hasMany(onlineResourceImgs::class, 'online_resources_id', 'id');
    }
}
