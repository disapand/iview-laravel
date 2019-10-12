<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\televisionResources
 *
 * @property int $id
 * @property string $channel 频道名称
 * @property string $form 展现形式
 * @property string $detail 频道介绍，特点描述
 * @property string $area 覆盖地区
 * @property string $language 语言
 * @property string $category 类别
 * @property string $station 所属电视台
 * @property string $minimum_buy 最小投放预算或最小投放周期
 * @property string $time 广告时长
 * @property string $company 媒体所属公司或集团名称
 * @property string $contributor 资源上传负责人姓名
 * @property string $price 价格区间（美金）
 * @property string $country 国家或地区
 * @property string $program 热门节目
 * @property string $image 频道logo、热门节目截图等图片（图片格式可多种）
 * @property string $requirements 上刊要求，如：无法刊登的产品类型、需要提前多久预定等
 * @property int $isuse 是否有效
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\televisionResources onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereArea($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereChannel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereContributor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereDetail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereForm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereIsuse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereMinimumBuy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereProgram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereRequirements($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereStation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResources whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\televisionResources withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\televisionResources withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\televisionResourcesImg[] $televisionResourcesImgs
 */
class televisionResources extends Model
{
    use SoftDeletes;

    /*
     *
     * */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'channel', 'form', 'detail', 'area', 'language', 'category', 'station', 'minimum_buy', 'time', 'company',
        'contributor', 'price', 'country', 'program', 'image', 'requirements', 'isuse', 'userid'
    ];

    public function televisionResourcesImgs()
    {
        return $this->hasMany('App\Models\televisionResourcesImg', 'television_resources_id', 'id');
    }

}
