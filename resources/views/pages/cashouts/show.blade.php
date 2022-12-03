@extends('layouts.app')

@section('title', 'Cash Out')

@push('plugin-styles')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> --}}
@endpush

@section('content')
<div id="cashout">
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Cash Out Details</h4>
                        <a class="btn btn-primary" href="{{route('cashouts.index')}}">
                          <span class="glyphicon glyphicon-edit">Go Back</span>
                        </a>
                        <a class="btn btn-danger" href="{{route('cashouts.printReceipt', $cashOut->id)}}">
                            <span class="glyphicon glyphicon-edit">Print Receipt</span>
                          </a>
                        <br>
                        
                        <div class="col-md-6 table-responsive pt-3 px-1 float-left">
                          <table class="table table-bordered" id="myTable">
                            <tbody>
                                <tr>
                                    <th>Cash Out ID</th>
                                    <td>
                                        <p class="d-inline">{{ $cashOut->id }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Receipt No</th>
                                    <td>
                                        <p class="d-inline">{{ $cashOut->receipt_no }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Name of Payee</th>
                                    <td>
                                        <p class="d-inline">{{ $cashOut->name_of_payee }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Purpose</th>
                                    <td>
                                        <p class="d-inline">{{ $cashOut->purpose }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>
                                        <p class="d-inline">{{ $cashOut->description }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>
                                        <p class="d-inline">{{ $cashOut->amount }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>
                                        <p class="d-inline">{{ date("d-m-Y",strtotime($cashOut->created_at)) }}</p>
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
@endsection

@push('plugin-scripts')
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script> --}}

@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
