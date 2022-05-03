@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Slider Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Slider Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Slider</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($slider) {{ route('slider.update', $slider->id) }} @endisset @empty($slider) {{ route('slider.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($slider)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            @isset($slider)
                                <img src="{{ $slider->image }}" style="height: 100px" alt="">
                            @endisset
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
