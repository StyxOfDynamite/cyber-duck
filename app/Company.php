<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    // use SoftDeletes;

    protected $guarded = [ 'id' ];
    //

    protected $fillable = ['name', 'email', 'website', 'logo'];

    public function employees()
    {
    	return $this->hasMany('\App\Employee');
    }
}
