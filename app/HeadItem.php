<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HeadItem extends Model
{
    use SoftDeletes;

    protected $table = 'head_items';
    protected $dates = ['deleted_at'];
    protected $fillable = ['head_name','head_category'];
    
    public function account_item(){
        return $this->hasMany('App\AccountItem');
    }
    
}
