@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Galeri Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Galeri Form</h2>
        <div class="card">
            <div class="card-header">
                <h4>Galeri Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('gallery.create') }}" class="badge badge-primary">Create</a>
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
                        @foreach ($galleries as $gallery)
                            <tr>
                                <td><img src="{{ $gallery->image }}" class="img-fluid" style="height: 100px" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('gallery.edit', $gallery->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST"
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
