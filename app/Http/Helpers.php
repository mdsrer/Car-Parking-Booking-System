<?php
use App\Models\Message;
use App\Models\Category;
use App\Models\PostTag;
use App\Models\PostCategory;
use App\Models\booking;
use App\Models\Wishlist;
use App\Models\Shipping;
use App\Models\SelectedBookingDB;
class Helper{
    public static function parkingCategoryList($option='all'){
        if($option='all'){
            return Category::orderBy('id','DESC')->get();
        }
        return Category::has('parkings')->orderBy('id','DESC')->get();
    }

    public static function selectedbookingCount($user_id=''){
       
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return SelectedBookingDB::where('user_id',$user_id)->where('booking_id',null)->sum('hours');
        }
        else{
            return 0;
        }
    }

    public function parking(){
        return $this->hasOne('App\Models\parking','id','parking_id');
    }

    public static function getAllparkingFromselectedbooking($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return SelectedBookingDB::with('parking')->where('user_id',$user_id)->where('booking_id',null)->get();
        }
        else{
            return 0;
        }
    }
    public static function totalselectedbookingPrice($user_id=''){
        if(Auth::check()){
            if($user_id=="") $user_id=auth()->user()->id;
            return SelectedBookingDB::where('user_id',$user_id)->where('booking_id',null)->sum('amount');
        }
        else{
            return 0;
        }
    }

    public static function grandPrice($id,$user_id){
        $booking=booking::find($id);
        dd($id);
        if($booking){
            $shipping_price=(float)$booking->shipping->price;
            $booking_price=self::bookingPrice($id,$user_id);
            return number_format((float)($booking_price+$shipping_price),2,'.','');
        }else{
            return 0;
        }
    }

}

?>