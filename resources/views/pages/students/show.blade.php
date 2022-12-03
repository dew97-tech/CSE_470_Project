@extends('layouts.app')

@section('title', 'Student')

@push('plugin-styles')
{{--
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> --}}
{{--
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> --}}
@endpush

@section('content')
<div id="student">
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Student Details</h4>
                        <div class="col-12 mb-1">
                            <a class="btn btn-secondary" href="{{route('students.index')}}">
                                <span class="glyphicon glyphicon-triangle-left">Go Back</span>
                            </a>
                            <a class="btn btn-danger" href="{{route('students.toggle', $student->id)}}">
                                <span class="glyphicon glyphicon-edit"> {{ $student->status == 1 ? 'Deactivate' :
                                    'Activate'}}</span>
                            </a>
                            <a class="btn btn-primary" href="{{route('students.printDetails', $student->id)}}">
                                <span class="glyphicon glyphicon-print"> Print Student Details</span>
                            </a>
                            <a class="btn btn-primary" href="{{route('students.printRoutine', $student->id)}}">
                                <span class="glyphicon glyphicon-print"> Print Class Routine</span>
                            </a>
                            <a class="btn btn-warning" href="{{route('students.printCard', $student->id)}}">
                                <span class="glyphicon glyphicon-print"> Print Student Card</span>
                            </a>
                            <a class="btn btn-success" href="{{route('cashins.create', $student->id)}}">
                                <span class="glyphicon glyphicon-edit"> Payment</span>
                            </a>
                        </div>
                        <br>
                        {{-- <div class="btn-group float-right" role="group">
                        </div> --}}
                        <div class="col-md-6 pt-3 px-1 float-left">
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-bordered" id="myTable">
                                        <tbody>
                                            <tr>
                                                <th>Student ID</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->student_id }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Student Photo</th>
                                                <td>
                                                    <img class="d-inline" style="width: 150px;"
                                                        src="{{ $student->photo }}" alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Location</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->location }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Name</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->name }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>DOB</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->dob }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->gender }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Blood Group</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->blood_group }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Phone</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->phone }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->email }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Address</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->address }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Father's Name</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->father_name }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Father's Phone No</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->father_no }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Mother's Name</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->mother_name }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Mother's Phone No</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->mother_no }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Parent's Office Address</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->parent_office_address }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Parent</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->parent }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Parent's Phone</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->parent_phone }}</p>
                                                </td>
                                            </tr>
                                            {{-- <tr>
                                                <th>Subjects</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->subjects }}</p>
                                                </td>
                                            </tr> --}}
                                            <tr>
                                                <th>Previous Institution</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->prev_institution }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Current Grade</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->current_grade }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Preferred Syllabus</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->preferred_syllabus }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Enrolling Level</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->enrolling_level }}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Source</th>
                                                <td>
                                                    <p class="d-inline">{{ $student->source }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- Generated QR block --}}
                        <div class="col-md-6 pt-3 px-1 float-right">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Generated QR</h5>
                                        <div class="container">
                                            {{ QrCode::generate( $student->student_id ) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Add New Batch Block --}}
                        <div class="col-md-6 pt-3 px-1 float-right">
                            <form class='form-horizontal' method="POST"
                                action="{{ route('students.addBatch', $student->id) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group form-inline">
                                            <div class="col-12">
                                                <h5>Add New Batch</h5>
                                            </div>
                                            <div class="col-12">
                                                <select name="batch" class="form-control selectpicker">
                                                    <option value="">Select Batch</option>
                                                    @foreach ($batches as $batch)
                                                    <option value="{{ $batch->id }}">{{ $batch->title }}</option>
                                                    @endforeach
                                                </select>
                                                <button id="save" type="submit" class="btn btn-primary text-center"
                                                    @click="save"><span class="glyphicon glyphicon-plus">
                                                        Add</span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        {{-- Registered Batch Block --}}
                        <div class="col-md-6 pt-3 px-1 float-right">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Registered Batches</h5>
                                    </div>
                                    <table class="table table-bordered" id="batchTable">
                                        <tbody>
                                            @foreach ($studentBatches as $index => $studentBatch)
                                            <tr>
                                                <th>{{ $index+1 }}</th>
                                                <td>
                                                    <p class="d-inline">{{ $studentBatch->title }}</p>
                                                </td>
                                                <td>
                                                    <a class="btn btn-danger"
                                                        href="{{route('students.removeBatch', [$student->id, $studentBatch->id])}}"
                                                        onclick="return confirm('Are You Sure !')">
                                                        <span class="glyphicon glyphicon-trash"> Remove</span>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{-- Class Routine Block --}}
                        <div class="col-md-6 pt-3 px-1 float-right">
                            <div class="card table-responsive">
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Class Routine</h5>
                                    </div>
                                    {{-- Smart Table Start --}}
                                    <table class="table table-bordered" id="batchTable">
                                        <tbody>
                                            <tr>
                                                <th>Day</th>
                                                @foreach ($periods as $period)
                                                <th>{{ date("g:i a", strtotime($period)) }}</th>
                                                @endforeach
                                            </tr>
                                            @foreach ($days as $day)
                                            <tr>
                                                <th>{{$day->name}}</th>
                                                @foreach ($periods as $period)
                                                <td>
                                                    @foreach ($studentBatches as $studentBatch)
                                                    {{ $studentBatch->timestamp == $period &&
                                                    property_exists(json_decode($studentBatch->days), $day->tag) ?
                                                    $studentBatch->title : NULL }}
                                                    @endforeach
                                                </td>
                                                @endforeach
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- Smart table end --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@push('plugin-scripts')
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js">
</script> --}}

@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
