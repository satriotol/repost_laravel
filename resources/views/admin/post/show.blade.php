@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Post Detail</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Post Detail</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Post</h4>
                    </div>
                    <div class="card-body">
                        <p>{{ $post->name }}</p>
                        <p>{{ $post->user->name }}</p>
                        <p>{{ $post->date }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4>Table</h4>
                        <div class="card-header-action">
                            <a href="{{ route('post_image.create', $post->id) }}" class="badge badge-primary">Create</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="myTable" class="display">
                            <thead>
                                <th>Social Media</th>
                                <th>Image</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($post->post_images as $post_image)
                                    <tr>
                                        <td>{{ $post_image->social_media->name }}</td>
                                        <td>
                                            <a href="{{ asset('uploads/' . $post_image->image) }}" data-lightbox="roadtrip">
                                                <img src="{{ asset('uploads/' . $post_image->image) }}" style="height: 100px"
                                                    class="img-fluid">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('post_image.edit', ['post_image' => $post_image->id, 'post' => $post_image->post_id]) }}"
                                                class="btn btn-warning">
                                                Edit
                                            </a>
                                            <form action="{{ route('post_image.destroy', $post_image->id) }}"
                                                method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
