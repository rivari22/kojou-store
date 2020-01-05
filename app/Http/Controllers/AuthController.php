<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\User;
use Mail;
use Auth;
// use Illuminate\Support\Facades\Auth;
use Alert;

use Illuminate\Foundation\Auth\RegistersUsers;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $category;
    public function __construct(){
        $this->category= Category::where('parent_id',null)->get();
    }

    public function register(){
        $category = $this->category;
        return view('homepage.register',compact('category'));
    }

    public function store(Request $data){
        // $remember_token = base64_encode($data['email']);
        $mydata = ([
            'name' => $data['name'],
            'username'=>$data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address'=>$data['address'],
            'phone'=>$data['phone'],
            'gender'=>$data['gender'],
            'birthday'=>$data['birthday'],
            'role'=>$data['role'],
            'status' =>'1',
        ]);
        User::create($mydata);
        // Mail::send('verifikasi',array('firstname' => $data['name'],'remember_token'=>$remember_token), function($pesan) use($data){
        //     $pesan->to($data['email'],'Verifikasi')->subject('Verifikasi Email');
        //     $pesan->from('mr_rivari@gmail.com','Verifikasi Akun Email Anda');
        // });
        return redirect(url('/auth/register'))->with('Sukses', 'User berhasil dibuat!');
    }

    public function login(Request $request){
        $email = $request->email;
        $pwd = $request->password;
        
        if(Auth::attempt(['email' => $email,'password' => $pwd])){
            $cek = User::where('id',Auth::user()->id)->first();
                if($cek->status == 0){
                    Auth::logout();
                    return redirect('/supplier')->with('', 'Maaf akun anda belum terverifikasi oleh admin!');
                }else{
                    return redirect('/product');
                }
        }else{
            return redirect('/')->with('', 'Email atau password salah!'); 
        }
    }
}
