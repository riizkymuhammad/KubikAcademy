<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Progeram;
use App\user;
use Hash;

class LearnController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


     public function index()
    {
        $data['progerams']=progeram::all();
        return view('kelas',$data);
    }

     public function create()
    {
        
        return view('create');
    }

     public function store(Request $request)
    {
        $progeram =[ 
        'name'=> $request -> nama,
        'pendaftaran'=> $request -> pendaftaran,
        'mulai'=> $request -> mulai,
        'selesai'=> $request -> selesai,
        ];

        $save = progeram::insert($progeram);
        if($save)
            return redirect('kelas');
        else
            return redirect()->back()->withInput();
       
    }

      public function show($id)
    {
        
       $data['progerams']=progeram::all();
        return view('kelas',$data);
    }

      public function edit($id)
    {
        
       $data['progerams']= progeram::find($id);
        return view('create',$data);
    }

     public function update(Request $request,$id)
    {
        if($request->has('password')){
            $password = $request->password;
      $user =[ 
        'name'=> $request -> nama,
        'email'=> $request -> email,
        'password' => $password,
        ];
    }
    else {
        $progeram =[ 
        'name'=> $request -> nama,
        'pendaftaran'=> $request -> pendaftaran,
        'mulai'=> $request -> mulai,
        'selesai'=> $request -> selesai,
        ];
    }
        $update = progeram::find($id)->update($progeram);
        if($update)
            return redirect('kelas');
        else
            return redirect()->back()->withInput();
    }


    public function destroy($id)
    {
        
        $progeram = Progeram::find($id);
        if($progeram){
            $progeram->destroy($id);
            
            $msg = 'Hapus User Berhasil.';
            }
        else{
            $msg = 'Hapus User Gagal!';
           
        }
         return redirect()->back()->withSuccess($msg);
    }
}