<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FavouriteParkingDB extends Model
{
    protected $fillable=['user_id','parking_id','selectedparking_id','price','amount','hours'];

    public function parking(){
        return $this->belongsTo(ParkingDB::class,'parking_id');
    }
}
