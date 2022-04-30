<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserDB;
use App\Models\BookingDB;
use App\Models\ParkingReviewDB;
use App\Rules\MatchOldPassword;
use Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index(){
        return view('user.index');
    }

    public function profile(){
        $profile=Auth()->user();
        // return $profile;
        return view('user.users.profile')->with('profile',$profile);
    }

    public function profileUpdate(Request $request,$id){
        // return $request->all();
        $user=UserDB::findOrFail($id);
        $data=$request->all();
        $status=$user->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated your profile');
        }
        else{
            request()->session()->flash('error','Please try again!');
        }
        return redirect()->back();
    }

    // booking
    public function bookingIndex(){
        $bookings=BookingDB::OrderBy('id','DESC')->where('user_id',auth()->user()->id)->paginate(10);
        return view('user.booking.index')->with('bookings',$bookings);
    }
    public function userbookingDelete($id)
    {
        $booking=BookingDB::find($id);
        if($booking){
           if($booking->status=="process" || $booking->status=='delivered' || $booking->status=='cancel'){
                return redirect()->back()->with('error','Cannot Cancle This Parking Anymore!');
           }
           else{
                $status=$booking->delete();
                if($status){
                    request()->session()->flash('success','Parking Has Been Cancelled!');
                }
                else{
                    request()->session()->flash('error','Cannot Cancle This Parking Anymore!');
                }
                return redirect()->route('user.booking.index');
           }
        }
        else{
            request()->session()->flash('error','Parking can not found');
            return redirect()->back();
        }
    }

    public function bookingshow($id)
    {
        $booking=BookingDB::find($id);
        // return $booking;
        return view('user.booking.show')->with('booking',$booking);
    }

    public function parkingReviewIndex(){
        $reviews=ParkingReviewDB::getAllUserReview();
        return view('user.review.index')->with('reviews',$reviews);
    }

    public function parkingReviewEdit($id)
    {
        $review=ParkingReviewDB::find($id);
        // return $review;
        return view('user.review.edit')->with('review',$review);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parkingReviewUpdate(Request $request, $id)
    {
        $review=ParkingReviewDB::find($id);
        if($review){
            $data=$request->all();
            $status=$review->fill($data)->update();
            if($status){
                request()->session()->flash('success','Review Updated');
            }
            else{
                request()->session()->flash('error','Please try again!');
            }
        }
        else{
            request()->session()->flash('error','Review not found!!');
        }

        return redirect()->route('user.parkingreview.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function parkingReviewDelete($id)
    {
        $review=ParkingReviewDB::find($id);
        $status=$review->delete();
        if($status){
            request()->session()->flash('success','Successfully deleted review');
        }
        else{
            request()->session()->flash('error','Something went wrong! Try again');
        }
        return redirect()->route('user.parkingreview.index');
    }

    public function changePassword(){
        return view('user.layouts.userPasswordChange');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
   
        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
   
        return redirect()->route('user')->with('success','Password successfully changed');
    }

    
}
