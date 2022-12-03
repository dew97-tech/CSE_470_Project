@extends('layouts.app')

@section('title', 'Potentials')

@push('plugin-styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endpush

@section('content')
<div id="learnings">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Potentials</h6>
                        <a id="create-new" type="button" class="btn btn-primary float-right" href="{{route('potentials.create')}}">Add New</a>
                        <div class="table-responsive pt-3 px-1">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Enrolling Level</th>
                                        <th>Parent Phone</th>
                                        <th>Exam Batch/Session</th>
                                        {{-- <th>Subjects</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($potentials as $index => $potential)
                                    <tr>
                                        <td>{{ $index++ + 1 }}</td>
                                        <td>{{ $potential->name }}</td>
                                        <td>{{ $potential->phone }}</td>
                                        <td>{{ $potential->enrolling_level }}</td>
                                        <td>{{ $potential->parent_phone }}</td>
                                        <td>{{ $potential->exam_batch_session }}</td>
                                        {{-- <td>{{ $user->subjects }}</td> --}}
                                        <td>
                                            {{-- <a class="btn btn-primary" href="{{route('doctors.show', $doctor->id)}}">
                                                <span class="glyphicon glyphicon-edit">Details</span>
                                            </a> --}}
                                            <a class="btn btn-secondary" href="{{route('potentials.convert', $potential->id)}}">
                                                <span class="glyphicon glyphicon-edit">Convert</span>
                                            </a>
                                            <a class="btn btn-primary" href="{{route('potentials.edit', $potential->id)}}">
                                                <span class="glyphicon glyphicon-edit">Edit</span>
                                            </a>
                                            <a class="btn btn-danger" href="{{route('potentials.destroy', $potential->id)}}" onclick="return confirm('Are you sure?')">
                                                <span class="glyphicon glyphicon-trash">Delete</span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
