@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Unit Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Unit Form</h2>
        <div class="card">
            <div class="card-header">
                <h4>Unit Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('unit.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable" class="display">
                    <thead>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor HP</th>
                        <th>Fax</th>
                        <th>E-mail</th>
                        <th>Gambar</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($units as $unit)
                            <tr>
                                <td>{{$unit->name}}</td>
                                <td>{{$unit->address}}</td>
                                <td>{{$unit->phone}}</td>
                                <td>{{$unit->fax}}</td>
                                <td>{{$unit->email}}</td>
                                <td><img src="{{ $unit->image }}" class="img-fluid" style="height: 100px" alt="">
                                </td>
                                <td>
                                    <a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('unit.destroy', $unit->id) }}" method="POST"
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
