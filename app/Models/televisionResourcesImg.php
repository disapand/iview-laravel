<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 */
class televisionResourcesImg extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'television_resources_id', 'url'
    ];

    public function televisionResources(){
        return $this->belongsTo('App\Models\televisionResources', 'television_resources_id', 'id');
    }

}
