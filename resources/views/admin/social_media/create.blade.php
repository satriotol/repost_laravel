@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Social Media Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Social Media Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Social Media</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($social_media) {{ route('social_media.update', $social_media->id) }} @endisset @empty($social_media) {{ route('social_media.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($social_media)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control"
                                    value="{{ isset($social_media) ? $social_media->name : '' }}" name="name" required>
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
