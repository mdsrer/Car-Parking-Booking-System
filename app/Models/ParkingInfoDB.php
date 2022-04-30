<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SelectedParkingDB;

class ParkingInfoDB extends Model
{
    protected $fillable=['title','slug','summary','description','cat_id','child_cat_id','price','brand_id','discount','status','photo','size','stock','is_featured','condition'];

    public static function searchParking(){
        return ParkingDB::with(['name','id'])->orderBy('id','desc')->paginate(10);
    }

    public function getReview(){
        return $this->hasMany('App\Models\parkingReview','parking_id','id')->with('user_info')->where('status','active')->orderBy('id','DESC');
    }

    public function selectedbookings(){
        return $this->hasMany(SelectedParkingDB::class)->whereNotNull('parking_id');
    }
}