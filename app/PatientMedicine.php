<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientMedicine extends Model
{
	protected $guarded = [];
	
    public function medicine(){
    	return $this->belongsTo(Medicine::class);
    }

    public function patient(){
    	return $this->belongsTo(Patient::class);
    }
}
