@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Social Media Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Social Media Form</h2>
        <div class="card">
            <div class="card-header">
                <h4>Social Media Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('social_media.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <th>Name</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($social_medias as $social_media)
                            <tr>
                                <td>{{ $social_media->name }}</td>
                                <td>
                                    <a href="{{ route('social_media.edit', $social_media->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('social_media.destroy', $social_media->id) }}" method="POST"
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
