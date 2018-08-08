<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class CaseImg extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function CaseResource()
    {
        return $this->belongsTo(CaseResource::class, 'case_resources_id', 'id');
    }
}
