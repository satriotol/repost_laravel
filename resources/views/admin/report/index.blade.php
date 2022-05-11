@extends('admin.layouts.main')
@section('content')
    <div class="section-header">
        <h1>Catatan Table</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Catatan Table</h2>
        <div class="card">
            <div class="card-header">
                <h4>Catatan Table</h4>
                <div class="card-header-action">
                    <a href="{{ route('report.create') }}" class="badge badge-primary">Create</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myTable2" class="display">
                    <thead>
                        <th>Date</th>
                        <th>Note</th>
                        <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reports as $report)
                            <tr>
                                <td>{{ $report->date }}</td>
                                <td>{!! $report->note !!}</td>
                                <td>
                                    <a href="{{ route('report.edit', $report->id) }}" class="btn btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('report.destroy', $report->id) }}" method="post"
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
