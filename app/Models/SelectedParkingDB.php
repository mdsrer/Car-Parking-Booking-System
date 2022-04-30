<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectedParkingDB extends Model
{
    protected $fillable=['user_id','parking_id','parking_id','hours','amount','price','status'];

    public static function getAllparkingFromCart(){
        return SelectedParkingDB::with('parking')->where('user_id',auth()->user()->id)->get();
    }
    
    public function parking()
    {
        return $this->belongsTo(ParkingDB::class, 'parking_id');
    }
    
    public function booking(){
        return $this->belongsTo(BookingDB::class, 'parking_id');
    }
}