<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $fillable=['body','discussion_id','user_id'];
    //
    public function store(CommentRequest $request)
    {
      //  return $request->all();
        $comment=Comment::create(array_merge($request->all(),['user_id'=>\Auth::user()->id]));
        if($comment->id)
            return 'success';
        return 'failed';
      //  return redirect()->action('PostController@show',['id'=>$request->get('discussion_id')]);
    }
}
