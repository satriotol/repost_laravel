@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Bidang Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Bidang Form</h2>
        <div class="card">
            <div class="card-header">
                <h4>Bidang Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('sector.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <th>Name</th>
                        <th>Dinas</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($sectors as $sector)
                            <tr>
                                <td>{{ $sector->name }}</td>
                                <td>{{ $sector->agency->name }}</td>
                                <td>
                                    <a href="{{ route('sector.edit', $sector->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('sector.destroy', $sector->id) }}" method="POST"
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
