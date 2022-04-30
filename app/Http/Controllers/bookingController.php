<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectedBookingDB;
use App\Models\BookingDB;
use App\UserDB;
use Helper;
use Illuminate\Support\Str;
class bookingController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings=BookingDB::bookingBy('id','DESC')->paginate(10);
        return view('backend.booking.index')->with('bookings',$bookings);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name'=>'string|required',
            'last_name'=>'string|required',
            'address1'=>'string|required',
            'phone'=>'numeric|required',
            'email'=>'string|required'
        ]);

        if(empty(SelectedBookingDB::where('user_id',auth()->user()->id)->where('booking_id',null)->first())){
            request()->session()->flash('error','No Parking Selected!');
            return back();
        }

        $booking=new BookingDB();
        $booking_data=$request->all();
        $booking_data['booking_number']='ORD-'.strtoupper(Str::random(10));
        $booking_data['user_id']=$request->user()->id;
        $booking_data['sub_total']=Helper::totalselectedbookingPrice();
        $booking_data['hours']=Helper::selectedbookingCount();

        $booking_data['status']="new";
        if(request('payment_method')=='paypal'){
            $booking_data['payment_method']='paypal';
            $booking_data['payment_status']='paid';
        }
        else{
            $booking_data['payment_method']='cod';
            $booking_data['payment_status']='Unpaid';
        }
        $booking->fill($booking_data);
        $status=$booking->save();
        if($booking)
        // dd($booking->id);
        $users=UserDB::where('role','admin')->first();
        $details=[
            'title'=>'New booking created',
            'actionURL'=>route('booking.show',$booking->id),
            'fas'=>'fa-file-alt'
        ];
        Notification::send($users, new StatusNotification($details));
        if(request('payment_method')=='paypal'){
            return redirect()->route('payment')->with(['id'=>$booking->id]);
        }
        else{
            session()->forget('selectedbooking');
            session()->forget('coupon');
        }
        SelectedBookingDB::where('user_id', auth()->user()->id)->where('booking_id', null)->update(['booking_id' => $booking->id]);
      
        request()->session()->flash('success','PARKING LOT successfully Booked!');
        return redirect()->route('home');
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $booking=BookingDB::find($id);
        return view('backend.booking.show')->with('booking',$booking);
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking=BookingDB::find($id);
        return view('backend.booking.edit')->with('booking',$booking);
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking=BookingDB::find($id);
        $this->validate($request,[
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($booking->selectedbooking as $selectedbooking){
                $parking=$selectedbooking->parking;
                // return $parking;
                $parking->stock -=$selectedbooking->hours;
                $parking->save();
            }
        }
        $status=$booking->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated Booking');
        }
        else{
            request()->session()->flash('error','Error while updating Booking');
        }
        return redirect()->route('booking.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $booking=BookingDB::find($id);
        if($booking){
            $status=$booking->delete();
            if($status){
                request()->session()->flash('success','Parking Has Been Cancelled!');
            }
            else{
                request()->session()->flash('error','Cannot Cancelled This Parking Anymore!');
            }
            return redirect()->route('booking.index');
        }
        else{
            request()->session()->flash('error','Cannot Cancelled This Parking Anymore!');
            return redirect()->back();
        }
    }
}
