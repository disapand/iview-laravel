<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class insight extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];
}
