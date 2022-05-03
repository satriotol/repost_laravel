@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Partner Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Partner Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Partner</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($partner) {{ route('partner.update', $partner->id) }} @endisset @empty($partner) {{ route('partner.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($partner)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control"
                                    value="{{ isset($partner) ? $partner->name : '' }}" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" class="form-control"
                                    value="{{ isset($partner) ? $partner->url : '' }}" name="url" required>
                            </div>
                            <div class="form-group">
                                <label>Gambar</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            @isset($partner)
                                <img src="{{ $partner->image }}" style="height: 100px" alt="">
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
