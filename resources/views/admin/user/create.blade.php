@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Post Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Post Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Post</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($post) {{ route('post.update', $post->id) }} @endisset @empty($post) {{ route('post.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($post)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ isset($post) ? $post->name : '' }}"
                                    name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" value="{{ isset($post) ? $post->date : '' }}"
                                    name="date" required>
                            </div>
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
