<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\PostImage\CreatePostImageRequest;
use App\Http\Requests\PostImage\UpdatePostImageRequest;
use App\Models\Post;
use App\Models\PostImage;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class PostImageController extends Controller
{
    public function create(Post $post)
    {
        $social_medias = SocialMedia::all();
        return view('admin.post_image.create', compact('post', 'social_medias'));
    }
    public function store(CreatePostImageRequest $request)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image->store('image', 'public_uploads');
            $data['image'] = $image;
        };
        PostImage::create($data);
        session()->flash('success');
        return redirect(route('post.show', $data['post_id']));
    }
    public function edit(PostImage $post_image, Post $post)
    {
        $social_medias = SocialMedia::all();
        return view('admin.post_image.create', compact('post', 'post_image', 'social_medias'));
    }
    public function update(UpdatePostImageRequest $request, PostImage $post_image)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->image->store('image', 'public_uploads');
            $post_image->deleteImage();
            $data['image'] = $image;
        };
        $post_image->update($data);
        session()->flash('success');
        return redirect(route('post.show', $data['post_id']));
    }
    public function destroy(PostImage $post_image)
    {
        $post_image->deleteImage();
        $post_image->delete();
        session()->flash('success');
        return redirect(route('post.show', $post_image->post_id));
    }
}
