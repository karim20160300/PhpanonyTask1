<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;
class AdminAuthController extends Controller
{
    //
    public function login(){
    	return view('admin/login');
    }

    public function loginPost(){
    	$rememberme = Request('rememberme') == 1 ? true : false;  
    	if(auth()->guard('admin')->attempt(['email' => Request('email') , 'password' => Request('password')],$rememberme)){
    		$admin = Admin::where(['email' => Request('email')])->update(['lastlogin' => Carbon::now()]);
    		return redirect('admin');
    	}else{
    		//session()->flash('error', trans('admin.loginerror'));
    		return redirect('admin/login');
    	}
    }

    public function logOut(){
    	auth()->guard('admin')->logout();
    	return redirect('admin/login');
    }

    public function forgorPassword(){
    	return view('admin.forgotpassword');
    }

    public function forgorPasswordPost(){
    	$admin = Admin::where('email',Request('email'))->first();
    	if(!empty($admin)){
    		$token = app('auth.password.broker')->createToken($admin);
    		$data = DB::table('password_resets')->insert([
    			'email' => $admin->email,
    			'token' => $token,
    			'created_at' => Carbon::now(),
    		]);
    		Mail::to($admin->email)->send(new AdminResetPassword(['data'=> $admin , 'token' => $token]));
    		session()->flash('success',trans('admin.EmailSent'));
    		return back();
    	}
    	return back();
    }

    public function resetpassword($token){
    	$checkToken = DB::table('password_resets')->where('token',$token)->where('created_at', '>' , Carbon::now()->subHours(2))->first();
    	// return dd($checkToken);
    	if(!empty($checkToken)){
    		return view('admin.resetpassword',['data' => $checkToken]);	
    	}else{
    		return redirect('admin/forgotpassword');
    	}
    }


    public function resetpasswordPost($token){
    	$this->validate(Request(),
	[
		'password' => 'required|confirmed',
		'password_confirmation'=> 'required',
	]);
    	$checkToken = DB::table('password_resets')->where('token',$token)->where('created_at', '>' , Carbon::now()->subHours(2))->first();
    	// return dd($checkToken);
    	if(!empty($checkToken)){
    		$admin = Admin::where('email', $checkToken->email)->update(['password' => bcrypt(Request('password'))]);
    		// DB::table('password_resets')->where('email',Request('email'))->delete();
    		auth()->guard('admin')->attempt(['email' => $checkToken->email , 'password' => Request('password')],true);
    		return redirect('admin');
    	}else{
    		return redirect('admin/forgotpassword');
    	}
    }
}
