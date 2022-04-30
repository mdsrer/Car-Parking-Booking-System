<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BookingDB extends Model
{
    protected $fillable=['booking_number','user_id','sub_total','total_ammount','hours','first_name','last_name','first_name','last_name','country','vat'];

    public function selectedbooking_info(){
        return $this->hasMany('App\Models\selectedbooking','parking_id','id');
    }

    public function selectedbooking(){
        return $this->hasMany(SelectedParking::class);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
