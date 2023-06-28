<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    //mebuat form 
    function index()
    {
        return view('pages.auth.register');
    }

    //membuat registrasi pengguna
    function register(Request $request)
    {
        //validasi data 
        $validateUser = $request->validate([
            'name' =>  'required',
            'contact' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);

        //proses registrasi data 
        $userData = new User;
        $userData->name = $request->name;
        $userData->contact = $request->contact;
        $userData->email = $request->email;
        $userData->password = bcrypt($request->password);
        $userData->save();

        //redirect 
        return redirect()->to('/login')->with('sukses', 'registrasi berhasil');
    }
}