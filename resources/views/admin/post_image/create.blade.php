@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Image Post Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Image Post Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Image Post</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($post_image) {{ route('post_image.update', $post_image->id) }} @endisset @empty($post_image) {{ route('post_image.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($post_image)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Social Media</label>
                                <select class="custom-select" required name="social_media_id">
                                    <option value="">Open this select menu</option>
                                    @foreach ($social_medias as $social_media)
                                        <option value="{{ $social_media->id }}"
                                            @isset($post_image) @if ($social_media->name === $post_image->social_media->name) selected @endif @endisset>
                                            {{ $social_media->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" accept="image/*" class="form-control" name="image">
                            </div>
                            @isset($post_image)
                                <img src="{{ asset('uploads/' . $post_image->image) }}" style="height: 100px" alt="">
                            @endisset
                            <input type="text" name="post_id" value="{{ $post->id }}" class="d-none">
                            <div class="text-right">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
