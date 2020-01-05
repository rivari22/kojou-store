<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Alert;

class UserController extends Controller
{
    public function index(){
        $user = User::where('id','!=',Auth::user()->id)->get();
        return view('admin.user.index',compact('user'));
    }

    public function changestatus($id){
        $user = User::find($id);
        if($user->status==0){
                $change = '1';
        }else{
                $change = '0';
        }
        User::where('id',$id)->update(['status' => $change]);
        return redirect(route('admin.user'))->with('success', 'Status changed!');
    }

    public function create(){
        return view('admin.user.add');
    }

    public function store(Request $data){
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
            'status' =>"0",
        ]);
        User::create($mydata);
        return redirect(route('admin.user'))->with('success', 'User Successfully added!');
    }

    public function edit($id){
        $user = User::find($id);
        return view ('admin.user.edit',compact('user'));
    }

    public function update(Request $data){
        $mydata = $mydata = ([
            'name' => $data['name'],
            'username'=>$data['username'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'address'=>$data['address'],
            'phone'=>$data['phone'],
            'gender'=>$data['gender'],
            'birthday'=>$data['birthday'],
            'role'=>$data['role'],
            'status' =>"0"
        ]);
        User::where('id',$data->id)->update($mydata);
        return redirect(route('admin.user'))->with('success', 'Status changed!');
    }

    public function delete($id){
        $delete = User::find($id);
        // alert($category)->question('Are you sure?','You won\'t be able to revert this!')->showCancelButton(false)->showConfirmButton()->focusConfirm();
        $delete->delete();
        return redirect(route('admin.user'));
    }
    public function logout(){
        Auth::logout();
        Alert::success('','Berhasil Keluar');
        return redirect('/admin/dashboard');
    }
}
