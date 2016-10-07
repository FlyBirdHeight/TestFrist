<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User_artisan extends Model
{
    protected $table = 'user_artisan';
    protected $primaryKey='art_id';
    public $timestamps=false;
    protected $guarded = [];
}
