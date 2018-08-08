<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class CaseResource extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function Imgs() {
        return $this->hasMany(CaseImg::class, 'case_resources_id', 'id');
    }
}
