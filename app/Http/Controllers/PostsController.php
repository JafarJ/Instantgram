<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $users = auth()->user()->following()->pluck('profiles.user_id');
        $suggested = Profile::with('user')->withCount('followers')->orderByDesc('followers_count')->simplepaginate(5);
        $posts = Post::whereIn('user_id', $users)->with('user')->latest()->simplepaginate(30);

        return view('posts.index', compact('posts', 'suggested'));
    }

    public function explore_top(){
      
        $posts = Post::with('user')->withCount('likes')->orderByDesc('likes_count')->simplepaginate(90);

        return view('posts.explore', compact('posts'));
    }

    public function explore_recent(){
      
        $posts = Post::with('user')->withCount('likes')->latest()->simplepaginate(90);

        return view('posts.explore', compact('posts'));
    }

    public function liked(){
        $likedPosts = auth()->user()->liked()->pluck('post_user.post_id');
        
        $posts = Post::whereIn('id', $likedPosts)->with('user')->latest()->simplepaginate(90);

        return view('posts.explore', compact('posts'));
    }

    public function create(){
        return view('posts/create');
    }

    public function store(){
        $data = request()->validate([
            'caption' => 'required',
            'image' => 'required|image',
        ]);

        $imagePath = request('image')->store('uploads', 'public');

        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        return redirect('/profile/' . auth()->user()->id);

    }

    public function show(\App\Models\Post $post){
        return view('posts.show', compact('post'));
    }
}
