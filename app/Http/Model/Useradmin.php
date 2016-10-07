<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Useradmin extends Model
{
    protected $table = 'admin';
    protected $primaryKey='aid';
    public $timestamps=false;
}
