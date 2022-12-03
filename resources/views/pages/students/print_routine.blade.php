<!DOCTYPE html>
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>School Management System</title>
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
    <h5 class="card-title" style="text-align: center; font-size:18px;font-weight:700">Student Routine</h5>
    <br>
    <div class="col-xs-12" style="float: right; width:100%; padding-left:1px; page-break-inside: avoid;">
        <div class="card">
            <div class="card-body" style="overflow: auto;">
                <div class="col-12">

                    <div class="student_info col-12"
                        style="font-size: 14px; font-weight:600;text-transform:uppercase; padding-bottom: 0.8rem; margin-left:-1rem">
                        <p style="font-size: 14px; font-weight:600;">NAME: {{$student->name}}</p>
                        <h5 style="font-size: 14px; font-weight:600;">STUDENT ID: {{$student->student_id}}</h5>
                    </div>
                </div>
                <table border="1" class="table table-bordered" id="batchTable">
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
                                property_exists(json_decode($studentBatch->days), $day->tag) ? $studentBatch->title :
                                NULL }}
                                @endforeach
                            </td>
                            @endforeach
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p align="right">Printed on: {{date('d-m-Y', time())}}</p>
            </div>

        </div>
    </div>
    <br>
    <br>
    {{-- @include('components.footer') --}}
</body>

</html>