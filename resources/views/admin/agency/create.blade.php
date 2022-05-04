@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Dinas Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Dinas Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dinas</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($agency) {{ route('agency.update', $agency->id) }} @endisset @empty($agency) {{ route('agency.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($agency)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control"
                                    value="{{ isset($agency) ? $agency->name : '' }}" name="name" required>
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
