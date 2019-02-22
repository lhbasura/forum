<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\Http\Requests\PostRequest;
use Chenhua\MarkdownEditor\Facades\MarkdownEditor;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth',['only'=>'create','update','store','edit']);
    }

    //
    public function index()
    {
        $discussions=Discussion::latest()->get();
        return view('forum.index',compact("discussions"));
    }

    public function show($id)
    {
        $discussion=Discussion::findOrFail($id);
        $html=MarkdownEditor::parse($discussion->body);
        return view('forum.show',compact("discussion","html"));
    }

    public function create()
    {
        return view('forum.create');
    }
    public function store(PostRequest $request){
        $data=[
            'user_id'=>\Auth::user()->id,
            'last_user_id'=>\Auth::user()->id
        ];
        $discussion=Discussion::create(array_merge($data,$request->all()));
        return redirect()->action('PostController@show',['id'=>$discussion->id]);

    }
    public function edit($id)
    {
        $discussion=Discussion::findOrFail($id);
        if(\Auth::user()->id!=$discussion->user_id)
        {
            return redirect('/');
        }
        return view('forum.edit',compact('discussion'));
    }
    public function update(PostRequest $request,$id)
    {
        $discussion=Discussion::findOrFail($id);
        $discussion->update($request->all());
        return redirect()->action("PostController@show",['id'=>$id]);
    }



}
