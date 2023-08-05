<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tweet;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Tweet $id) {

        $comment = new Comment();
        $comment->tweet_id = $id->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('content');
        $comment->save();

        return redirect()->route('tweets.show', $id->id)->with('success', 'Comment posted successfully');

    }
}
