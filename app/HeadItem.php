<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeadItem extends Model
{
    use SoftDeletes;

    protected $table = 'head_items';
    protected $dates = ['deleted_at'];
}
