<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{

    public function show(Tweet $id)
    {
        return view('tweets.show', [
            'tweet' => $id
        ]);
    }

    public function store()
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240',
        ]);

        // Create data in database
        $validated['user_id'] = auth()->id();

        Tweet::create($validated);
        return redirect()->route('dashboard')->with('success', 'Tweet added successfully!');
    }

    public function destroy(Tweet $id)
    {

        if(auth()->id() !== $id->user_id){
            abort(404, "You dont have permission to do that");
        }

        $id->delete();

        return redirect()->route('dashboard')->with('success', 'Tweet deleted successfully!');
    }

    public function edit(Tweet $id)
    {
        if(auth()->id() !== $id->user_id){
            abort(404, "You dont have permission to do that");
        }

        $editing = true;
        return view('tweets.show', [
            'tweet' => $id,
            'editing' => $editing
        ]);
    }

    public function update(Tweet $id)
    {
        $validated = request()->validate([
            'content' => 'required|min:3|max:240'
        ]);

        $id->update($validated);

        return redirect()->route('tweets.show', $id->id)->with('success', 'Tweet updated successfully!');

    }
}
