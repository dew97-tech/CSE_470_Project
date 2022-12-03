@extends('layouts.app')

@section('title', 'Students')

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
                        <h6 class="card-title">Students</h6>
                        <div class="col-12">
                            <a type="button" class="btn btn-warning float-right ml-1" href="{{route('students.index', $status ? 0 : null)}}">
                                <span class="glyphicon">{{ $status ? 'Deactivated Students' : 'Current Students'}}</span>
                            </a>
                            <a id="create-new" type="button" class="btn btn-primary float-right" href="{{route('students.create')}}">
                                <span class="glyphicon">Add New</span>
                            </a>
                        </div>
                        <div class="table-responsive pt-3 px-1">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Parent</th>
                                        <th>Parent Phone</th>
                                        <th>Address</th>
                                        {{-- <th>Subjects</th> --}}
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($students as $index => $student)
                                    <tr>
                                        <td>{{ $index++ + 1 }}</td>
                                        <td>{{ $student->student_id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->parent }}</td>
                                        <td>{{ $student->parent_phone }}</td>
                                        <td>{{ $student->address }}</td>
                                        {{-- <td>{{ $user->subjects }}</td> --}}
                                        <td>
                                            <a class="btn btn-info" href="{{route('students.show', $student->id)}}">
                                                <span class="glyphicon glyphicon-edit">Details</span>
                                            </a>
                                            <a class="btn btn-primary" href="{{route('students.edit', $student->id)}}">
                                                <span class="glyphicon glyphicon-edit">Edit</span>
                                            </a>
                                            <a class="btn btn-danger" href="{{route('students.destroy', $student->id)}}" onclick="return confirm('Are you sure?')">
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
