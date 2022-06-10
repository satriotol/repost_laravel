<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin()
    {
        $posts = Post::whereHas('user', function ($q){
            $q->where('sector_id', Auth::user()->sector_id);
        })->get()->count();
        $users = User::role('user')->where('sector_id', Auth::user()->sector_id)->get()->count();
        $post_images = PostImage::whereHas('post.user', function ($q){
            $q->where('sector_id', Auth::user()->sector_id);
        })->get()->count();
        $social_medias = SocialMedia::all()->count();
        $social_media_count = SocialMedia::withCount('post_images')->get();
        $users_count = User::role('user')->where('sector_id', Auth::user()->sector_id)->withCount('post_images')->orderBy('name', 'asc')->get();
        $users_post_count = User::role('user')->where('sector_id', Auth::user()->sector_id)->withCount('posts')->orderBy('name', 'asc')->get();
        return view('admin.dashboard', compact('posts', 'users', 'post_images', 'social_medias', 'social_media_count', 'users_count', 'users_post_count'));
    }
}
