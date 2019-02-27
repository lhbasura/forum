<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('store');
    }
    public function index(){
        return 'index of User';
    }
    public function store(UserRequest $request)
    {
        $user=\Auth::user();
        $file=$request->file('avatar');
        $destinationPath='uploads/avatar';
        $fileName=$user->id.'_'.time().'_'.$file->getClientOriginalName();
        $file->move($destinationPath,$fileName);
        $avatar=$destinationPath.'/'.$fileName;
        $user->avatar=$avatar;
        $user->save();
        return $avatar;
    }
    //
    public function update($id){

    }
    public function updateAvatar(){

    }
}
