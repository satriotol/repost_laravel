@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Unit Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Unit Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Unit</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($unit) {{ route('unit.update', $unit->id) }} @endisset @empty($unit) {{ route('unit.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($unit)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" value="{{ isset($unit) ? $unit->name : '' }}"
                                    name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="summernote" cols="30" rows="10"
                                    required>{{ isset($unit) ? $unit->description : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" value="{{ isset($unit) ? $unit->address : '' }}"
                                    name="address" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" value="{{ isset($unit) ? $unit->phone : '' }}"
                                    name="phone" required>
                            </div>
                            <div class="form-group">
                                <label>Fax</label>
                                <input type="text" class="form-control" value="{{ isset($unit) ? $unit->fax : '' }}"
                                    name="fax" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ isset($unit) ? $unit->email : '' }}"
                                    name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control" accept="image/*">
                            </div>
                            @isset($unit)
                                <img src="{{ $unit->image }}" style="height: 100px" alt="">
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
