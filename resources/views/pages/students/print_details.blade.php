<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Augmenta Education</title>
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/favicon/kandari.png') }}">
    <link rel="manifest" href="assets/favicon/manifest.json">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    {{--
    <link href="{{ asset('css/free.min.css') }}" rel="stylesheet"> <!-- icons --> --}}
    <link href="{{ public_path('css/free.min.css') }}" rel="stylesheet" type="text/css" />
    {{--
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" /> --}}
    <!-- Main styles for this application-->
    {{--
    <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}
    <link href="{{ public_path('css/style.css') }}" rel="stylesheet" type="text/css" />

    {{-- @yield('css')

    @stack('plugin-styles')
    @stack('style') --}}
</head>

<body>
    <style>
        body {
            background-color: #ffffff;
        }
    </style>
    {{-- @include('components.small_header') --}}
    <h4 class="card-title" style="text-align: center">Student Details</h4>
    <br>
    <div class="col-xs-6" style="float: left; width:60%; padding-right:5px;">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered" style="font-size: 11px" id="myTable">
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
                                <img class="d-inline" style="width: 120px;"
                                    src="data:image/jpeg;base64, {{ base64_encode(@file_get_contents(url($student->photo))) }}">
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
    <div class="col-xs-6" style="float: right; width:40%; padding-left:1px;">
        <div class="card">
            <div class="card-body">
                <div class="col-xs-12">
                    <h5>Generated QR</h5>
                    <div class="container">
                        {{ QrCode::generate( $student->student_id ) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-6" style="float: right; width:40%; padding-left:1px;">
        <div class="card">
            <div class="card-body">
                <div class="col-xs-12">
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
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="col-xs-6" style="float: right; width:100%; padding-left:1px; page-break-inside: avoid;">
        <div class="card">
            <div class="card-body" style="overflow: auto;">
                <div class="col-12">
                    <h5>Class Routine</h5>
                </div>
                <table class="table table-bordered" id="batchTable">
                    <tbody>
                        <tr>
                            <th>Day</th>
                            <th>8AM</th>
                            <th>9AM</th>
                            <th>10AM</th>
                            <th>11AM</th>
                            <th>12PM</th>
                            <th>3PM</th>
                            <th>4PM</th>
                            <th>5PM</th>
                            <th>6PM</th>
                            <th>7PM</th>
                        </tr>
                        <tr>
                            <th>Sun</th>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime == '8AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime == '9AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime ==
                                    '10AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime ==
                                    '11AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime ==
                                    '12PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime == '3PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime == '4PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime == '5PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime == '6PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sun) && $studentBatch->classtime == '7PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Mon</th>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime == '8AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime == '9AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime ==
                                    '10AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime ==
                                    '11AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime ==
                                    '12PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime == '3PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime == '4PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime == '5PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime == '6PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->mon) && $studentBatch->classtime == '7PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Tues</th>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '8AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '9AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '10AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '11AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '12PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '3PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '4PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '5PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '6PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->tues) && $studentBatch->classtime ==
                                    '7PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Wed</th>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime == '8AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime == '9AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime ==
                                    '10AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime ==
                                    '11AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime ==
                                    '12PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime == '3PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime == '4PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime == '5PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime == '6PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->wed) && $studentBatch->classtime == '7PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Thurs</th>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '8AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '9AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '10AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '11AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '12PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '3PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '4PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '5PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '6PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->thurs) && $studentBatch->classtime ==
                                    '7PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Fri</th>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime == '8AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime == '9AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime ==
                                    '10AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime ==
                                    '11AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime ==
                                    '12PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime == '3PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime == '4PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime == '5PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime == '6PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->fri) && $studentBatch->classtime == '7PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th>Sat</th>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime == '8AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime == '9AM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime ==
                                    '10AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime ==
                                    '11AM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime ==
                                    '12PM' ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime == '3PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime == '4PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime == '5PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime == '6PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($studentBatches as $studentBatch)
                                <p>{{ !empty(json_decode($studentBatch->days)->sat) && $studentBatch->classtime == '7PM'
                                    ? $studentBatch->title : '' }}</p>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
    {{-- @include('components.footer') --}}
</body>

</html>