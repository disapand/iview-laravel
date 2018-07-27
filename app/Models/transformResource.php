<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\transformResource
 *
 * @property int $id
 * @property string $city 城市
 * @property string $form 形式
 * @property string|null $unit_num 单位数量
 * @property string $position 媒体具体位置
 * @property string|null $language 语言
 * @property string $category 类别
 * @property string $area 覆盖区域
 * @property string $SOV SOV
 * @property int|null $visitor 人流量
 * @property int|null $traffic 车流量
 * @property int|null $minimum_buy 最小采购周期或单位
 * @property string $format 规格尺寸
 * @property string $number 广告载体面数
 * @property string|null $time 广告刊出时间
 * @property string|null $media_price 媒体报价（美元）
 * @property string|null $price 执行价（美元）
 * @property int|null $total_num 媒体总数量
 * @property string|null $company 媒体所属公司或集团
 * @property string|null $contributor 媒介开发者
 * @property string|null $detail 媒体细节
 * @property string $country 国家或地区
 * @property string $name 名称
 * @property string|null $requirements 上刊要求
 * @property int $isuse 是否有效
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\transformResourceImg[] $transformResourceImgs
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResource onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereContributor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereIsuse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereMediaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereMinimumBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereSOV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereTotalNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereTraffic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereUnitNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResource whereVisitor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResource withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResource withoutTrashed()
 * @mixin \Eloquent
 */
class transformResource extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function transformResourceImgs() {
        return $this->hasMany(transformResourceImg::class, 'transform_resources_id', 'id');
    }

}
