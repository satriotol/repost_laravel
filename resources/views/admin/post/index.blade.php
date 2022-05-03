@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Post Table</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Post Table</h2>
        <div class="card">
            <div class="card-header">
                <h4>Post Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('post.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <th>Name</th>
                        <th>Date</th>
                        <th>User</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->date }}</td>
                                <td>{{ $post->user->name ?? "" }}</td>
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