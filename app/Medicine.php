<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MedicineStock;
class Medicine extends Model
{
    protected $guarded = [];

    public function medicine_sum($id){
    	return MedicineStock::where('medicine_id',$id)->sum('quantity');
    }
}
