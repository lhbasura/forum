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
        $request->file('avatar');
        dd('you will store your info');
    }
    //
    public function update($id){

    }
}
