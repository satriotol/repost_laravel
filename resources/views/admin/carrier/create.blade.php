@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Karir Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Karir Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Karir</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($carrier) {{ route('carrier.update', $carrier->id) }} @endisset @empty($carrier) {{ route('carrier.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($carrier)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control"
                                    value="{{ isset($carrier) ? $carrier->name : '' }}" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Kualifikasi Umum</label>
                                <textarea name="general_qualification" class="summernote" cols="30" rows="10"
                                    required>{{ isset($carrier) ? $carrier->general_qualification : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Kualifikasi Khusus</label>
                                <textarea name="special_qualification" class="summernote" cols="30" rows="10"
                                    required>{{ isset($carrier) ? $carrier->special_qualification : '' }}</textarea>
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
