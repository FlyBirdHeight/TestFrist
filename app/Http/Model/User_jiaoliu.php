<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_jiaoliu extends Model
{
    protected $table = 'users_jiaoliu';
    protected $primaryKey='link_id';
    public $timestamps=false;
    protected $guarded = [];
}
