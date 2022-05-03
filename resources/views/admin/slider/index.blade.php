@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Slider Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Slider Form</h2>
        <div class="card">
            <div class="card-header">
                <h4>Slider Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('slider.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td><img src="{{ $slider->image }}" class="img-fluid" style="height: 100px" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('slider.destroy', $slider->id) }}" method="POST"
                                        class="d-inline">
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
@endsection
