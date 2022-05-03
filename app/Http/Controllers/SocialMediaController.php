<?php

namespace App\Http\Controllers;

use App\Http\Requests\SocialMedia\CreateSocialMediaRequest;
use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_medias = SocialMedia::all();
        return view('admin.social_media.index', compact('social_medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.social_media.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSocialMediaRequest $request)
    {
        $data = $request->all();
        SocialMedia::create($data);
        session()->flash('success');
        return redirect(route('social_media.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SocialMedia $social_media)
    {
        return view('admin.social_media.create', compact('social_media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateSocialMediaRequest $request, SocialMedia $social_media)
    {
        $data = $request->all();
        $social_media->update($data);
        session()->flash('success');
        return redirect(route('social_media.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SocialMedia $social_media)
    {
        $social_media->delete();
        session()->flash('success');
        return redirect(route('social_media.index'));
    }
}
