@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Post Table</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Post Table</h2>
        <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Post</h4>
                        </div>
                        <div class="card-body">
                            {{ $post_count }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="far fa-image"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Jumlah Screenshoot</h4>
                        </div>
                        <div class="card-body">
                            {{ $post_image_count }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4>Post Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('export_pdf', Auth::user()->id) }}" target="_blank"
                        class="badge badge-success mr-1">Export PDF</a>
                    <a href="{{ route('post.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable2" class="display">
                    <thead>
                        <th>Date</th>
                        <th>Name</th>
                        <th>User</th>
                        <th>Image Count</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->date }}</td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->user->name ?? '' }}</td>
                                <td>{{ $post->post_images->count() }}</td>
                                <td>
                                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">
                                        Detail
                                    </a>
                                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('post.destroy', $post->id) }}" method="POST"
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
@push('script')
    <script>
        $(document).ready(function() {
            $('#myTable2').DataTable({
                "order": [
                    [0, "desc"]
                ]
            });
        });
    </script>
@endpush
