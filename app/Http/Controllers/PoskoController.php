<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\progeram;

class PoskoController extends Controller
{ 

	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:posko');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posko');
    }


     public function peserta()
    {
        $data['users']=user::all();
        return view('users',$data);
    }

     public function bantuan()
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
        'name'=> $request -> name,
        'pendaftaran'=> $request -> pendaftaran,
        'mulai'=> $request -> mulai,
        'selesai'=> $request -> selesai,
        ];

        $save = Progeram::insert($progeram);
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
 
        $progeram =[ 
        'name'=> $request -> nama,
        'pendaftaran'=> $request -> pendaftaran,
        'mulai'=> $request -> mulai,
        'selesai'=> $request -> selesai,
        
        ];
    
        $update = progeram::find($id)->update($progeram);
        if($update)
            return redirect('kelas');
        else
            return redirect()->back()->withInput();
    }


    public function destroy($id)
    {
        
        $user = User::find($id);
        if($kelas){
            $user->destroy($id);
            
            $msg = 'Hapus Kelas Berhasil.';
            }
        else{
            $msg = 'Hapus Kelas Gagal!';
           
        }
         return redirect()->back()->withSuccess($msg);
    }
    public function konten(){
      return view('konten');
    }
}
