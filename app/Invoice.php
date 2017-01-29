<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Invoice extends Model
{
    use SoftDeletes;

    protected $table = 'invoices';
    protected $dates = ['deleted_at'];
    protected $fillable =['user_id','type','status','invoice_created_by','note'];
    
    public function account_item(){
        return $this->belongsTo('App\AccountItem','account_item_id');
    }
    public function student(){
        return $this->belongsTo('App\Student','student_id');
    }
}
