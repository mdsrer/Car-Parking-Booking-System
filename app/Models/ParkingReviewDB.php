<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingReviewDB extends Model
{
    protected $fillable=['user_id','parking_id','rate','review','status'];

    public function user_info(){
        return $this->hasOne('App\User','id','user_id');
    }

    public static function getAllReview(){
        return ParkingReviewDB::with('user_info')->paginate(10);
    }
    public static function getAllUserReview(){
        return ParkingReviewDB::where('user_id',auth()->user()->id)->with('user_info')->paginate(10);
    }

    public function parking(){
        return $this->hasOne(ParkingDB::class,'id','parking_id');
    }
}