@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>User Table</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">User Table</h2>
        <div class="card">
            <div class="card-header">
                <h4>User Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('user.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Post</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->getRoleNames()->first() }}</td>
                                <td>{{ $user->posts->count() }}</td>
                                <td>
                                    <a href="{{ route('export_pdf', $user->id) }}" target="_blank" class="btn btn-success">
                                        PDF
                                    </a>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST"
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
