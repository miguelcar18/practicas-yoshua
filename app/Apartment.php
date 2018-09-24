<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $fillable = [];
    protected $primaryKey = 'id';
	protected $table = 'apartments';


	public function status(){
		if ($this->id === 1) {
			return 'Activo';
		}else{
			return 'Inactivo';
		}
	}
}