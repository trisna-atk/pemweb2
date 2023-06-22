<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    function index()
    {
        $userData = User::get();
        return view('pages.user.index', compact('userData'));
    }

    function create()
    {
        return view('pages.user.create');
    }

    function store(Request $request)
    {
        $userData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
        ]) ;

        User::create($userData);
        return redirect()->to('/user');
           
    }

    function edit($id)
    {
       $userData = User::find($id);
       return view('pages.user.edit', compact('userData'));

    }

    function update($id, Request $request)
    {
        $validasiUser = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'password' => 'required',
        ]) ;

        User::find($id)->update($validasiUser);
        return redirect()->to('/user');
    }

    function delete($id)
    {
      $userData = User::find($id)->delete();
      return redirect()->to('user');
    }
}