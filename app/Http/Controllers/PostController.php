<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreatePostRequest;
use App\Models\Post;
use App\Models\PostImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::where('user_id', Auth::user()->id)->with('user', 'post_images');
            return DataTables::of($posts)->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('post.show', $row->id) . '" class="btn btn-primary">Detail</a>';
                    $btn = $btn . '<a href="' . route('post.edit', $row->id) . '" class="btn btn-warning ml-1">Edit</a>';
                    $btn = $btn . '
                        <form action="' . route('post.destroy', $row->id) . '" method="POST"
                            class="d-inline">
                            ' . csrf_field() . '
                            ' . method_field("DELETE") . '
                            <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure?\')">
                            Delete
                            </button>
                        </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // $posts = Post::where('user_id', Auth::user()->id)->get();
        $post_count = Post::where('user_id', Auth::user()->id)->count();
        $post_image_count = PostImage::whereHas('post', function ($q) {
            $q->where('user_id', Auth::user()->id);
        })->count();
        return view('admin.post.index', compact('post_count', 'post_image_count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Post::create($data);
        session()->flash('success');
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        if (Auth::user()->id != $post->user_id) {
            return redirect(route('post.index'));
        }
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::user()->id != $post->user_id) {
            return redirect(route('post.index'));
        }
        return view('admin.post.create', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, Post $post)
    {
        $data = $request->all();
        $post->update($data);
        session()->flash('success');
        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        session()->flash('success');
        return redirect(route('post.index'));
    }
}
