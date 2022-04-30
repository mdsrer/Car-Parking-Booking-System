<?php

namespace App\Http\Controllers;
use App\Models\SelectedBookingDB;
use App\User;
use Auth;
use Session;
use Newsletter;
use DB;
use Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class FrontendController extends Controller
{
   
    public function index(Request $request){
        return redirect()->route($request->user()->role);
    }

    public function home(){
        $featured=ParkingDB::where('status','active')->where('is_featured',1)->orderBy('price','DESC')->limit(2)->get();
        $parkings=ParkingDB::where('status','active')->orderBy('id','DESC')->limit(8)->get();

        return view('frontend.index')
                ->with('parking_lists',$parkings);
    }

    public function parkingDetail($slug){
        $parking_detail= ParkingDB::getparkingBySlug($slug);
        return view('frontend.pages.parking_detail')->with('parking_detail',$parking_detail);
    }

    public function parkingGrids(){
        $parkings=ParkingDB::query();

        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $parkings=$parkings->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $parkings=$parkings->orderBy('price','ASC');
            }
        }
        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            $parkings->whereBetween('price',$price);
        }
        $recent_parkings=ParkingDB::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        if(!empty($_GET['show'])){
            $parkings=$parkings->where('status','active')->paginate($_GET['show']);
        }
        else{
            $parkings=$parkings->where('status','active')->paginate(9);
        }

        return view('frontend.pages.parking-grids')->with('parkings',$parkings)->with('recent_parkings',$recent_parkings);
    }
    
    public function parkingLists(){
        $parkings=ParkingDB::query();
        
        if(!empty($_GET['sortBy'])){
            if($_GET['sortBy']=='title'){
                $parkings=$parkings->where('status','active')->orderBy('title','ASC');
            }
            if($_GET['sortBy']=='price'){
                $parkings=$parkings->orderBy('price','ASC');
            }
        }

        if(!empty($_GET['price'])){
            $price=explode('-',$_GET['price']);
            $parkings->whereBetween('price',$price);
        }

        $recent_parkings=ParkingDB::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        if(!empty($_GET['show'])){
            $parkings=$parkings->where('status','active')->paginate($_GET['show']);
        }
        else{
            $parkings=$parkings->where('status','active')->paginate(6);
        }
        return view('frontend.pages.parking-lists')->with('parkings',$parkings)->with('recent_parkings',$recent_parkings);
    }

    public function parkingSearch(Request $request){
        $recent_parkings=ParkingDB::where('status','active')->orderBy('id','DESC')->limit(3)->get();
        $parkings=ParkingDB::orwhere('title','like','%'.$request->search.'%')
                    ->orwhere('slug','like','%'.$request->search.'%')
                    ->orwhere('description','like','%'.$request->search.'%')
                    ->orwhere('summary','like','%'.$request->search.'%')
                    ->orwhere('price','like','%'.$request->search.'%')
                    ->orderBy('id','DESC')
                    ->paginate('9');
        return view('frontend.pages.parking-grids')->with('parkings',$parkings)->with('recent_parkings',$recent_parkings);
    }

    public function login(){
        return view('frontend.pages.login');
    }

    public function loginSubmit(Request $request){
        $data= $request->all();
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'],'status'=>'active'])){
            Session::put('user',$data['email']);
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }

    public function logout(){
        Session::forget('user');
        Auth::logout();
        request()->session()->flash('success','Logout successfully');
        return back();
    }

    public function register(){
        return view('frontend.pages.register');
    }
    public function registerSubmit(Request $request){
        $this->validate($request,[
            'name'=>'string|required|min:2',
            'email'=>'string|required|unique:users,email',
            'password'=>'required|min:6|confirmed',
        ]);
        $data=$request->all();
        $check=$this->create($data);
        Session::put('user',$data['email']);
        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }
    public function create(array $data){
        return UserDB::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>Hash::make($data['password']),
            'status'=>'active'
            ]);
    }

    public function showResetForm(){
        return view('auth.passwords.old-reset');
    }
    
}
