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
                            action="@isset($sector) {{ route('sector.update', $sector->id) }} @endisset @empty($sector) {{ route('sector.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($sector)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" value="{{ isset($sector) ? $sector->name : '' }}"
                                    name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Dinas</label>
                                <select class="custom-select" required name="agency_id">
                                    <option value="">Open this select menu</option>
                                    @foreach ($agencies as $agency)
                                        <option value="{{ $agency->id }}"
                                            @isset($sector) @if ($agency->id === $sector->agency_id) selected @endif @endisset>
                                            {{ $agency->name }}
                                        </option>
                                    @endforeach
                                </select>
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
