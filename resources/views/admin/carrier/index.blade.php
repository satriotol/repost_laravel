@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Karir Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Karir Form</h2>
        <div class="card">
            <div class="card-header">
                <h4>Karir Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('carrier.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <th>Nama</th>
                        <th>Ketentuan Umum</th>
                        <th>Ketentuan Khusus</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($carriers as $carrier)
                            <tr>
                                <td>{{ $carrier->name }}</td>
                                <td>{!! $carrier->general_qualification !!}</td>
                                <td>{!! $carrier->special_qualification !!}</td>
                                <td>
                                    <a href="{{ route('carrier.edit', $carrier->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('carrier.destroy', $carrier->id) }}" method="POST"
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
