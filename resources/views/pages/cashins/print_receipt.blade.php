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
    <link href="{{ public_path('css/free.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ public_path('css/style.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>
    <style>
        body {
            background-color: #ffffff;
        }

        table,
        th,
        td {
            border: 1px solid;
        }

        table {
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            width: 60%;
        }

        .cut_line {
            margin-top: 8rem;
            margin-bottom: 2rem
        }
    </style>
    {{-- @include('components.small_header') --}}
    <div class="col-12">
        <h4 class="card-title d-inline" style="text-align: center; top: 50%;">
            {{-- <img src="{{public_path('assets/img/logo.jpeg')}}" height="46" alt="Augmenta Logo"> --}}
            <p>Student Receipt</p>
        </h4>
    </div>

    <div class="col-6" style="float:left; width: 50%;">
        <p>Student ID: {{ $student->student_id }}</p>
        <p>Name: {{ $student->name }}</p>
    </div>
    <div class="col-6" style="float:right; width: 50%; text-align:right;">
        <p>Receipt No: {{ $cashin->receipt_no }}</p>
        <p>Date: {{ date("d-m-Y",strtotime($cashin->created_at)) }}</p>
    </div>
    <div class="col-12" style="text-align: center; margin-top: 10px;">
        <h5>Paid Batches</h5>
        <br>

        <table class="table table-bordered" id="batchTable">
            <tbody>
                <tr>
                    <th>#</th>
                    <th>Batch Name</th>
                    <th>Paid Fee</th>
                    <th>Month</th>
                </tr>
                @foreach (json_decode($cashin->paid_batches) as $index => $studentBatch)
                <tr>
                    <td>{{$index+1}}</td>
                    <td>{{ $studentBatch->batch_name }}</td>
                    <td>{{ $studentBatch->batch_fee }}</td>
                    <td>{{ $cashin->month.' '.date("Y") }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{--
    </div> --}}
    <br>
    {{-- <div class="col-md-6" style="float:left; width: 50%;"> --}}
        {{-- <div class="col-md-6" style="float:left; width: 50%;">
        </div> --}}
        <div class="col-md-12" style="float:right; width: 100%; text-align:right;">
            <p align="right">Collected By: {{ $cashin->collected_by }}</p>
            <br>
            <p>Signature: ___________________________</p>
        </div>
    </div>
    <div class="footer_part">
        {{--
        <hr style="border: 0.5px solid black;"> --}}
        {{-- @include("components.footer") --}}
    </div>
    {{-- Line start --}}

    <div class="cut_line">
        <img style="width:30px; display:inline-block;"
            src="data:image/jpeg;base64, {{ base64_encode(@file_get_contents('https://res.cloudinary.com/augmenta/image/upload/v1665729224/generic_images/Scissor-PNG-Clipart_jswov7.png')) }}"
            alt="Augmenta Logo">
        <hr style="border: 1px dashed black;display:inline-block;width:98%;">
    </div>
    {{-- Line end --}}
    {{-- Cheat part start --}}
    {{-- @include("components.small_header")
    <div class="cheat">
        <div class="col-6" style="float:left; width: 50%;">
            <p>Student ID: {{ $student->student_id }}</p>
            <p>Name: {{ $student->name }}</p>
        </div>
        <div class="col-6" style="float:right; width: 50%; text-align:right;">
            <p>Receipt No: {{ $cashin->receipt_no }}</p>
            <p>Date: {{ date("d-m-Y",strtotime($cashin->created_at)) }}</p>
        </div>
        <table class="table table-bordered" id="batchTable">
            <tbody>
                <tr>
                    <th colspan="3" style="text-align: left;">Total Fee</th>
                    <td style="text-align: center;">{{$cashin->total_fee}} /-</td>
                </tr>
            </tbody>
        </table>
    </div> --}}
    {{-- @include("components.footer") --}}
    {{-- Cheat part end --}}
</body>

</html>