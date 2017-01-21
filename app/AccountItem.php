<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AccountItem extends Model
{
    use SoftDeletes;

    protected $table = 'account_items';
    protected $dates = ['deleted_at'];
    protected $fillable =['account_item_name','account_item_price','accuont_item_created_by','item_type'];


    public function class_name() {
        return $this->belongsTo('App\ClassName','class_id');
    }
    public function head_item() {
        return $this->belongsTo('App\HeadItem','head_items_id');
    }
    
}
