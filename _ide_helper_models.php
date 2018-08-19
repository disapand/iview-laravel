<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\CaseImg
 *
 * @property int $id
 * @property int|null $case_resources_id 所属的案例资源
 * @property string $url 图片、视频等对应的链接
 * @property string $category 图片还是视频
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\CaseResource|null $CaseResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CaseImg onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseImg whereCaseResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseImg whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseImg whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseImg whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CaseImg withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CaseImg withoutTrashed()
 * @mixin \Eloquent
 * @property \Carbon\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseImg whereDeletedAt($value)
 */
	class CaseImg extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CaseResource
 *
 * @property int $id
 * @property string $category 分类
 * @property string $title 标题
 * @property string $content 案例内容
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CaseImg[] $imgs
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CaseResource onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseResource whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseResource whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseResource whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseResource whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseResource whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseResource whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\CaseResource whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CaseResource withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CaseResource withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CaseImg[] $Imgs
 */
	class CaseResource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\dynamic
 *
 * @property int $id
 * @property string|null $tag 标签
 * @property string|null $title 标签
 * @property string|null $content 内容
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamic onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamic whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamic whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamic whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\dynamic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamic withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamic withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\dynamicImg[] $imgs
 */
	class dynamic extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\dynamicImg
 *
 * @property-read \App\Models\dynamic $dynamic
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamicImg onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamicImg withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\dynamicImg withoutTrashed()
 */
	class dynamicImg extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Img
 *
 * @property int $id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Img onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Img whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Img withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Img withoutTrashed()
 * @mixin \Eloquent
 */
	class Img extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\insight
 *
 * @property int $id
 * @property string|null $category 分类
 * @property string|null $title 标题
 * @property string|null $content 内容
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\insight onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\insight whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\insight whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\insight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\insight whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\insight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\insight whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\insight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\insight withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\insight withoutTrashed()
 * @mixin \Eloquent
 */
	class insight extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\internetcelebrityResourceImgs[] $Imgs
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\internetcelebrityResourceCategory[] $categories
 */
	class internetcelebrityResource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\internetcelebrityResourceCategory
 *
 * @property int $id
 * @property int|null $internetcelebrity_resources_id
 * @property string $name
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\internetcelebrityResource[] $internetcelerityResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceCategory onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereInternetcelebrityResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceCategory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceCategory withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceCategory withoutTrashed()
 * @mixin \Eloquent
 */
	class internetcelebrityResourceCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\internetcelebrityResourceImgs
 *
 * @property int $id
 * @property int|null $internetcelebrity_resources_id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\internetcelebrityResource|null $internetcelerityResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceImgs onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereInternetcelebrityResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\internetcelebrityResourceImgs whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceImgs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\internetcelebrityResourceImgs withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\internetcelebrityResource|null $internetbrityResouce
 * @property-read \App\Models\internetcelebrityResource|null $internetcelebrityResource
 */
	class internetcelebrityResourceImgs extends \Eloquent {}
}

namespace App\Models{
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
	class newspaperResource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\newspaperResourceImg
 *
 * @property int $id
 * @property int|null $newspaper_resources_id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\newspaperResource|null $newspaperResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\newspaperResourceImg onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResourceImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResourceImg whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResourceImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResourceImg whereNewspaperResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResourceImg whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\newspaperResourceImg whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\newspaperResourceImg withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\newspaperResourceImg withoutTrashed()
 * @mixin \Eloquent
 */
	class newspaperResourceImg extends \Eloquent {}
}

namespace App\Models{
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
	class onlineResource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\onlineResourceImgs
 *
 * @property int $id
 * @property int|null $online_resources_id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\onlineResource|null $onlineResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResourceImgs onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereOnlineResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\onlineResourceImgs whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResourceImgs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\onlineResourceImgs withoutTrashed()
 * @mixin \Eloquent
 */
	class onlineResourceImgs extends \Eloquent {}
}

namespace App\Models{
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
	class outdoorResource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\outdoorResourceImgs
 *
 * @property-read \App\Models\outdoorResource $outdoorResource
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResourceImgs onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResourceImgs withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\outdoorResourceImgs withoutTrashed()
 * @mixin \Eloquent
 * @property int $id
 * @property int|null $outdoor_resources_id 对应的户外资源
 * @property string $url 图片的地址
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereOutdoorResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\outdoorResourceImgs whereUrl($value)
 */
	class outdoorResourceImgs extends \Eloquent {}
}

namespace App\Models{
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
	class televisionResources extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\televisionResourcesImg
 *
 * @property int $id
 * @property int $television_resources_id 电视资源的ID
 * @property string $url 图片的链接
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\televisionResources $televisionResources
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResourcesImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResourcesImg whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResourcesImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResourcesImg whereTelevisionResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResourcesImg whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\televisionResourcesImg whereUrl($value)
 * @mixin \Eloquent
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\televisionResourcesImg onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\televisionResourcesImg withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\televisionResourcesImg withoutTrashed()
 */
	class televisionResourcesImg extends \Eloquent {}
}

namespace App\Models{
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
	class transformResource extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\transformResourceImg
 *
 * @property int $id
 * @property int|null $transform_resources_id
 * @property string $url
 * @property \Carbon\Carbon|null $deleted_at
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Models\transformResource|null $transformResource
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereTransformResourcesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\transformResourceImg whereUrl($value)
 * @mixin \Eloquent
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResourceImg onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResourceImg withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\transformResourceImg withoutTrashed()
 */
	class transformResourceImg extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

