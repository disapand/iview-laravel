<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class newspaperResourceImg extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $guarded = [
        'id', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function newspaperResource() {
        return $this->belongsTo(newspaperResource::class, 'newspaper_resources_id', 'id');
    }
}
