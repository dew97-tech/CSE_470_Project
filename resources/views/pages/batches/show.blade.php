@extends('layouts.app')

@section('title', 'Batch')

@push('plugin-styles')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> --}}
@endpush

@section('content')
<div id="batch">
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Batch Details</h4>
                        <a class="btn btn-primary" href="{{route('batches.index')}}">
                          <span class="glyphicon glyphicon-edit">Go Back</span>
                        </a>
                        <a class="btn btn-danger" href="{{route('batches.printStudentList', $batch->id)}}">
                            <span class="glyphicon glyphicon-edit">Print Student List</span>
                          </a>
                        <br>
                        {{-- <div class="btn-group float-right" role="group">
                        </div> --}}
                        <div class="col-md-6 table-responsive pt-3 px-1 float-left">
                          <table class="table table-bordered" id="myTable">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>
                                        <p class="d-inline">{{ $batch->id }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <p class="d-inline">{{ $batch->status == 1 ? 'Active' : 'Inactive' }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td>
                                        <p class="d-inline">{{ $batch->title }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Subject</th>
                                    <td>
                                        <p class="d-inline">{{ $batch->batchSubject->name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Teacher</th>
                                    <td>
                                        <p class="d-inline">{{ $batch->batchTeacher->name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Starting Date</th>
                                    <td>
                                        <p class="d-inline">{{ $batch->start_date }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Class Time</th>
                                    <td>
                                        <p class="d-inline">{{ date("g:i a", strtotime($batch->timestamp)) }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Monthly Fee</th>
                                    <td>
                                        <p class="d-inline">{{ $batch->fee }}</p>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-md-6 pt-3 px-1 float-right">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Registered Students</h5>
                                    </div>
                                    <table class="table table-bordered" id="batchTable">
                                        <tbody>
                                            @foreach ($batchStudents as $index => $batchStudent)
                                            <tr>
                                                <th>{{ $index+1 }}</th>
                                                <td>
                                                    <p class="d-inline">{{ $batchStudent->name }}</p>
                                                </td>
                                                {{-- <td>
                                                    <a class="btn btn-danger" href="{{route('students.removeBatch', [$batch->id, $batchStudent->id])}}" onclick="return confirm('Are you sure?')">
                                                        <span class="glyphicon glyphicon-trash">Remove</span>
                                                    </a>
                                                </td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-3 px-1 float-right">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Days</h5>
                                    </div>
                                    <table class="table table-bordered" id="batchTable">
                                        <tbody>
                                            <tr>
                                                <th>Sun</th>
                                                <th>Mon</th>
                                                <th>Tues</th>
                                                <th>Wed</th>
                                                <th>Thurs</th>
                                                <th>Fri</th>
                                                <th>Sat</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <p>{{ !empty(json_decode($batch->days)->sun) ? html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') : '' }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ !empty(json_decode($batch->days)->mon) ? html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') : '' }}</p>
                                                </td>                                                <td>
                                                    <p>{{ !empty(json_decode($batch->days)->tues) ? html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') : '' }}</p>
                                                </td>                                                <td>
                                                    <p>{{ !empty(json_decode($batch->days)->wed) ? html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') : '' }}</p>
                                                </td>                                                <td>
                                                    <p>{{ !empty(json_decode($batch->days)->thurs) ? html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') : '' }}</p>
                                                </td>                                                <td>
                                                    <p>{{ !empty(json_decode($batch->days)->fri) ? html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') : '' }}</p>
                                                </td>                                                <td>
                                                    <p>{{ !empty(json_decode($batch->days)->sat) ? html_entity_decode('&#9989;', ENT_QUOTES, 'UTF-8') : '' }}</p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script> --}}

@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
