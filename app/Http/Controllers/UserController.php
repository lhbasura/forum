<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }

    public function store(UserRequest $request)
    {
        $user=\Auth::user();
        $file=$request->file('avatar');
        $destinationPath='/upload/avatar';
        $fileName=$user->id.'_'.time().'_'.$file->getClientOriginalName();
        $file->move($destinationPath,$fileName);
        $user->avatar=$destinationPath.'/'.$fileName;
    }
    //
    public function update($id){

    }
}
