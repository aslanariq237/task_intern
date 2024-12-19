<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return User::all();
    }    

    public function Login(Request $req){
        $auth = $req->only('email', 'password');

        if (Auth::attempt($auth)) {
            return ['Success', 'Berhasil Menyimpan data'];
        }else{
            return ['Gagal', 'Email atau Password yang anda masukkan salah'];
        }
    }

    public function Logout(){
        Auth::logout();
        return redirect()->back()->with('Berhasil Logout');
    }

    public function createUser(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        if($user->save()){
            return ["success" => "Berasil"];
        }
        // dd  ($user);
        return redirect()->route('login.tampil');
    }
}
