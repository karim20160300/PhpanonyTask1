<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Settings;
use App\Cats;
use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    //

    public function changepassword(){
    	return view('admin/changepassword');
    }

    public function changepasswordPost(){
    	$this->validate(Request(),
	[
		'password' => 'required|confirmed',
		'password_confirmation'=> 'required',
	]);
    	$admin = Admin::where('email', Request('email'))->update(['password' => bcrypt(Request('password'))]);
    	return redirect('admin');
    }

    public function setting()
    {
    	return view('admin/setting');
    }

    public function settingPost(){
    	$this->validate(Request(),
    [
    	'sitename'=>'required'
    	, 'siteemail'=>'required'
    	, 'sitekeywords'=>'required'
    	,'desc'=>'required'
    	,'status'=>'required'
    	,'maintanancemsg'=>'required',
    ]);

    if (Settings::count() > 0) {
       $setting = Settings::where('id',1)->update([
    	'sitename'=> Request('sitename')
    	, 'siteemail'=>Request('siteemail')
    	, 'sitekeywords'=>Request('sitekeywords')
    	,'desc'=>Request('desc')
    	,'status'=>Request('status')
    	,'maintanancemsg'=>Request('maintanancemsg')
    ]);
    }else{
    	Settings::create(['sitename'=> Request('sitename')
    	, 'siteemail'=>Request('siteemail')
    	, 'sitekeywords'=>Request('sitekeywords')
    	,'desc'=>Request('desc')
    	,'status'=>Request('status')
    	,'maintanancemsg'=>Request('maintanancemsg')]);
    }

    return back();
    }

    public function showAllCats(){
    	$cats = Cats::all();
    	return view('admin/showallcats',['cats' => $cats]);
    }


    public function addNewCat(){
    	return view('admin/addnewcat');
    }
    public function addNewCatPost(){
    	
    	 Cats::create(['catname' => Request('catname')]);
    	 return back();
    }

    public function editcat($id){
    	$cat = Cats::find($id);
    	return view('admin/editcat',['cat' => $cat]);
    }

    public function editcatPost($id){
    	$cat = Cats::where('id',$id)->update([
    	'catname' => Request('catname'),
    ]);
    	return back();
    }

    public function deletecat($id){
    	$delcat = Cats::find($id);
    	$delcat->delete();
    	return back();
    }

    public function showcat($id){
    	$cat = Cats::find($id);
    	return view('admin/showcat',['cat' => $cat]);	
    }
}
