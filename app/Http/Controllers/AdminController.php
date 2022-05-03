<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostImage;
use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $posts = Post::all()->count();
        $users = User::all()->count();
        $post_images = PostImage::all()->count();
        $social_medias = SocialMedia::all()->count();
        return view('admin.dashboard', compact('posts', 'users', 'post_images', 'social_medias'));
    }
}
