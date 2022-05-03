@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Partner Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Partner Form</h2>
        <div class="card">
            <div class="card-header">
                <h4>Partner Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('partner.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <th>Nama</th>
                        <th>Link</th>
                        <th>Gambar</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partners as $partner)
                            <tr>
                                <td>{{ $partner->name }}</td>
                                <td>
                                    <a href="{{ $partner->url }}" target="_blank">
                                        {{ $partner->url }}
                                    </a>
                                </td>
                                <td><img src="{{ $partner->image }}" class="img-fluid" style="height: 100px" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('partner.edit', $partner->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('partner.destroy', $partner->id) }}" method="POST"
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
