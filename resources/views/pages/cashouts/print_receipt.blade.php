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
    </style>
    {{-- @include('components.small_header') --}}
    <div class="card-body">
        <h4 class="card-title" style="text-align: center">Cash Out Receipt</h4>
        <br>
        <div class="col-6" style="float:right; width: 50%; text-align:right;">
            <p>Receipt No: {{$cashout->receipt_no}}</p>
        </div>
        <div class="col-6" style="float:right; width: 50%; text-align:left;">
            <p>Date: {{ date("d-m-Y",strtotime($cashout->created_at)) }}</p>
        </div>
        <div class="col-md-6 table-responsive pt-3 px-1 float-left">
            <table class="table table-bordered" id="myTable">
                <tbody>

                    <tr>
                        <th>Name of Payee</th>
                        <td>
                            <p class="d-inline">{{ $cashout->name_of_payee }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Purpose</th>
                        <td>
                            <p class="d-inline">{{ $cashout->purpose }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>
                            <p class="d-inline">{{ $cashout->description }}</p>
                        </td>
                    </tr>
                    <tr>
                        <th>Amount</th>
                        <td>
                            <p class="d-inline">{{ $cashout->amount }}</p>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="col-md-6" style="float:right; width: 50%; text-align:right;">
        {{-- <p>Collected By: {{ $cashin->collected_by }}</p>
        <br> --}}

        <br>
        <br>
        <p>Signature: ___________________________</p>
    </div>
    <div class="footer_div" style="position:relative; bottom:-45rem;">
        {{-- @include('components.footer') --}}
    </div>
</body>

</html>