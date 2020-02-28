<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facedes\DB;
use App\file;

use Storage;

class uploadController extends Controller
{
    
    public function upload(Request $request){
    	$user = new file;
        $user->title=input::get('name');
    	if (input::hasFile("file")) {
    		$file = input::file("file");
    		$file ->  move(public_path().'/file',$file->getClientOriginalName());
    		$user->name=$file->getClientOriginalName();
    		$user->size=$file->getClientSize();
    		$user->type=$file->getClientMimeType();
    	}
    	$user->save();

    	return redirect('admin/konten');

    	
    }
    // public function showall(){
    //     $user = file::all();
    //     return view('halaman',['user'=>$user]);
    // }
}
