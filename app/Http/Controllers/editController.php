<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class editController extends Controller
{
    public function index(){
    	//
    }
    public function update(Request $request){
    	$data = ['name'=>$request->name,
    			 'email'=>$request->email];
    	DB::table('users')->where('id',$request->id)->update($data);
    	return redirect('/profile');
    }
    public function delete(Request $request){
    	DB::delete('delete from users')->where('id',$request->id);
    }
}
