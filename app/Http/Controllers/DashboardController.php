<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $tweet = Tweet::orderBy('created_at', 'DESC');

        if (request()->has('search')) {
            $tweet = $tweet->where('content', 'like', '%'. request()->get('search', '') . '%');
        }

        return view('dashboard', [
            'tweets' => $tweet->paginate(6)
        ]);
    }
}
