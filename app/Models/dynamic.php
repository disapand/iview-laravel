<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 */
class dynamic extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];
}
