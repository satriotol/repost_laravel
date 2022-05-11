@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Catatan Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Catatan Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Catatan</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($report) {{ route('report.update', $report->id) }} @endisset @empty($report) {{ route('report.store') }} @endempty"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            @isset($report)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" class="form-control" value="{{ isset($report) ? $report->date : '' }}"
                                    name="date" required>
                            </div>
                            <div class="form-group">
                                <label>Catatan</label>
                                <textarea name="note" class="summernote2" cols="30" rows="10"
                                    required>{{ isset($report) ? $report->note : '' }}</textarea>
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
