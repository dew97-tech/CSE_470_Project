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
</head>

<body>
    <style>
        body {
            background-color: #ffffff;
        }
    </style>
    {{-- @include("components.small_header") --}}
    <h4 class="card-title" style="text-align: center">{{ $batch->title }} - Registered Students</h4>
    {{-- <div class="col-md-6 table-responsive pt-3 px-1 float-left">
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
                        <p class="d-inline">{{ $batch->timestamp }}</p>
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
    </div> --}}
    <div class="col-md-6 pt-3 px-1">
        <div class="card">
            <div class="card-body">
                {{-- <div class="col-12">
                    <h5>Registered Students</h5>
                </div> --}}
                <table class="table table-bordered" id="batchTable">
                    <tbody>
                        <tr>
                            <th>SL No.</th>
                            <th>Student ID</th>
                            <th>Name</th>
                        </tr>
                        @foreach ($batchStudents as $index => $batchStudent)
                        <tr>
                            <th>{{ $index+1 }}</th>
                            <td>
                                <p class="d-inline">{{ $batchStudent->student_id }}</p>
                            </td>
                            <td>
                                <p class="d-inline">{{ $batchStudent->name }}</p>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- @include('components.footer') --}}
</body>

</html>