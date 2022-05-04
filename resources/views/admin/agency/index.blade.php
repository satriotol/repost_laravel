@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Dinas Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Dinas Form</h2>
        <div class="card">
            <div class="card-header">
                <h4>Dinas Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('agency.create') }}" class="badge badge-primary">Create</a>
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
                        @foreach ($agencies as $agency)
                            <tr>
                                <td>{{ $agency->name }}</td>
                                <td>
                                    <a href="{{ route('agency.edit', $agency->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('agency.destroy', $agency->id) }}" method="POST"
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
