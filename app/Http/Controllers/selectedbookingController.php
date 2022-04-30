<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Models\ParkingDB;
use App\Models\Wishlist;
use App\Models\SelectedBookingDB;
use Illuminate\Support\Str;
use Helper;
class selectedbookingController extends Controller
{
    protected $parking=null;
    public function __construct(parking $parking){
        $this->parking=$parking;
    }

    public function addToselectedbooking(Request $request){

        if (empty($request->slug)) {
            request()->session()->flash('error','Invalid Parking');
            return back();
        }   

        $parking = parking::where('slug', $request->slug)->first();
        if (empty($parking)) {
            request()->session()->flash('error','Invalid Parking');
            return back();
        }

        $already_selectedbooking = SelectedBookingDB::where('user_id', auth()->user()->id)->where('booking_id',null)->where('parking_id', $parking->id)->first();

        if($already_selectedbooking) {
            $already_selectedbooking->hours = $already_selectedbooking->hours + 1;
            $already_selectedbooking->amount = $parking->price+ $already_selectedbooking->amount;

            if ($already_selectedbooking->parking->stock < $already_selectedbooking->hours || $already_selectedbooking->parking->stock <= 0) return back()->with('error','SORRY! NO MORE HOUR LEFT FOR THIS PARKING LOT');
            $already_selectedbooking->save();
            
        }else{
            
            $selectedbooking = new SelectedBookingDB;
            $selectedbooking->user_id = auth()->user()->id;
            $selectedbooking->parking_id = $parking->id;
            $selectedbooking->price = ($parking->price-($parking->price*$parking->discount)/100);
            $selectedbooking->hours = 1;
            $selectedbooking->amount=$selectedbooking->price*$selectedbooking->hours;

            if ($selectedbooking->parking->stock < $selectedbooking->hours || $selectedbooking->parking->stock <= 0) return back()->with('error','SORRY! NO MORE HOUR LEFT FOR THIS PARKING LOT');
            $selectedbooking->save();
            $wishlist=Wishlist::where('user_id',auth()->user()->id)->where('selectedbooking_id',null)->update(['selectedbooking_id'=>$selectedbooking->id]);
        }
        request()->session()->flash('success','PARKING LOT Added! Go to SELECTED PARKINGS');
        return back();       
    }  

    public function singleAddToselectedbooking(Request $request){
        $request->validate([
            'slug'      =>  'required',
            'quant'      =>  'required',
        ]);

        $parking = parking::where('slug', $request->slug)->first();
        if($parking->stock <$request->quant[1]){
            return back()->with('error','SORRY! NO MORE HOUR LEFT FOR THIS PARKING LOT');
        }
        if ( ($request->quant[1] < 1) || empty($parking) ) {
            request()->session()->flash('error','Invalid parkings');
            return back();
        }    

        $already_selectedbooking = SelectedBookingDB::where('user_id', auth()->user()->id)->where('booking_id',null)->where('parking_id', $parking->id)->first();

        if($already_selectedbooking) {
            $already_selectedbooking->hours = $already_selectedbooking->hours + $request->quant[1];

            $already_selectedbooking->amount = ($parking->price * $request->quant[1])+ $already_selectedbooking->amount;

            if ($already_selectedbooking->parking->stock < $already_selectedbooking->hours || $already_selectedbooking->parking->stock <= 0) return back()->with('error','SORRY! NO MORE HOUR LEFT FOR THIS PARKING LOT');

            $already_selectedbooking->save();
            
        }else{
            
            $selectedbooking = new SelectedBookingDB;
            $selectedbooking->user_id = auth()->user()->id;
            $selectedbooking->parking_id = $parking->id;
            $selectedbooking->price = ($parking->price-($parking->price*$parking->discount)/100);
            $selectedbooking->hours = $request->quant[1];
            $selectedbooking->amount=($parking->price * $request->quant[1]);
            if ($selectedbooking->parking->stock < $selectedbooking->hours || $selectedbooking->parking->stock <= 0) return back()->with('error','SORRY! NO MORE HOUR LEFT FOR THIS PARKING LOT');

            $selectedbooking->save();
        }
        request()->session()->flash('success','PARKING LOT Successfully Added! Please Go to SELECTED PARKINGS');
        return back();       
    } 
    
    public function selectedbookingDelete(Request $request){
        $selectedbooking = SelectedBookingDB::find($request->id);
        if ($selectedbooking) {
            $selectedbooking->delete();
            request()->session()->flash('success','Parking removed!');
            return back();  
        }
        request()->session()->flash('error','Error please try again');
        return back();       
    }     

    public function selectedbookingUpdate(Request $request){

        if($request->quant){
            $error = array();
            $success = '';

            foreach ($request->quant as $k=>$quant) {

                $id = $request->qty_id[$k];

                $selectedbooking = SelectedBookingDB::find($id);

                if($quant > 0 && $selectedbooking) {

                    if($selectedbooking->parking->stock < $quant){
                        request()->session()->flash('error','SORRY! NO MORE HOUR LEFT FOR THIS PARKING LOT');
                        return back();
                    }
                    $selectedbooking->hours = ($selectedbooking->parking->stock > $quant) ? $quant  : $selectedbooking->parking->stock;
                    
                    if ($selectedbooking->parking->stock <=0) continue;
                    $after_price=($selectedbooking->parking->price-($selectedbooking->parking->price*$selectedbooking->parking->discount)/100);
                    $selectedbooking->amount = $after_price * $quant;

                    $selectedbooking->save();
                    $success = 'Sucessfully updated!';
                }else{
                    $error[] = 'Invalid!';
                }
            }
            return back()->with($error)->with('success', $success);
        }else{
            return back()->with('Invalid!');
        }    
    }

    public function checkout(Request $request){
        return view('frontend.pages.checkout');
    }
}
