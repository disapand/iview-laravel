<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Member extends Authenticatable
{
    use SoftDeletes, Notifiable;

    protected $dates = ['deleted_at'];
    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    protected $hidden = ['password'];
}
