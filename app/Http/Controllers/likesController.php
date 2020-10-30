<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class likesController extends Controller
{
    public function store(Post $post){
        return auth()->user()->liked()->toggle($post->id);
    }
}
