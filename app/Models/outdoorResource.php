<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\outdoorResource
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\outdoorResourceImgs[] $outdoorResourceImgs
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResource onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResource withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResource withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property string $city 城市
 * @property string $form 形式
 * @property string|null $unit_num 单位数量
 * @property string|null $language 语言
 * @property string $category 类别
 * @property string $property 类别属性
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
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereContributor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereIsuse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereMediaPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereMinimumBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereSOV($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereTotalNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereTraffic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereUnitNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResource whereVisitor($value)
 */
class outdoorResource extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];

    public function outdoorResourceImgs() {
        return $this->hasMany(outdoorResourceImgs::class, 'outdoor_resources_id', 'id');
    }

}
