<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

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
        $avatar=$request->input('avatar');
        $width=$request->get('w');
        $height=$request->get('h');
        $xAlgn=$request->get('x');
        $yAlgn=$request->get('y');
        Image::make($avatar)->crop($width,$height,$xAlgn,$yAlgn)->save();
        $user->avatar=$avatar;
        $user->save();
        return redirect('/home');
    }
    //
    public function update($id){

    }
    public function avatar(Request $request){
        $user=\Auth::user();
        $file=$request->file('photo');
        $destinationPath='uploads/avatar';
        $fileName=$user->id.'_'.time().'_'.$file->getClientOriginalName();
        $avatar=$destinationPath.'/'.$fileName;
        $file->move($destinationPath,$fileName);
        Image::make($avatar)->fit(300,300)->save();

        return $avatar;
    }
}
