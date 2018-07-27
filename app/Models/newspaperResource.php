<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\newspaperResource
 *
 * @property int $id
 * @property string $name 媒体名称
 * @property string $form 媒体形式
 * @property string|null $ad_form 广告形式
 * @property string $detail 内容和特点
 * @property string $area 覆盖区域
 * @property string|null $language 语言
 * @property string $category 类别
 * @property int|null $minimum_buy 最小采购周期或单位
 * @property string $format 规格尺寸
 * @property string $cycle 发行周期
 * @property string|null $media_price 媒体报价（美元）
 * @property string|null $price 执行价（美元）
 * @property int $circulation 纸媒发行量
 * @property string $page 版面
 * @property string $country 国家或地区
 * @property string $version 版本
 * @property string|null $company 媒体所属公司或集团
 * @property string|null $contributor 媒介开发者
 * @property string|null $requirements 上刊要求
 * @property int $isuse 是否有效
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\newspaperResourceImg[] $newspaperResourcesImgs
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\newspaperResource onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereAdForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereCirculation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereContributor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereCycle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereIsuse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereMediaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereMinimumBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResource whereVersion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\newspaperResource withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\newspaperResource withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\newspaperResourceImg[] $newspaperResourceImgs
 */
class newspaperResource extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function newspaperResourceImgs() {
        return $this->hasMany(newspaperResourceImg::class, 'newspaper_resources_id', 'id');
    }
}
