<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $fillable = [];
    protected $primaryKey = 'id';
	protected $table = 'apartments';
}
