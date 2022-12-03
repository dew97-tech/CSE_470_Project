@extends('layouts.app')

@section('title', 'Cash In')

@push('plugin-styles')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"> --}}
@endpush

@section('content')
<div id="cashin">
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="text-align: center">Cash In Details</h4>
                        <a class="btn btn-primary" href="{{route('cashins.index')}}">
                          <span class="glyphicon glyphicon-edit">Go Back</span>
                        </a>
                        <a class="btn btn-danger" href="{{route('cashins.printReceipt', $cashin->id)}}">
                            <span class="glyphicon glyphicon-edit">Print Receipt</span>
                          </a>
                        <br>
                        {{-- <div class="btn-group float-right" role="group">
                        </div> --}}
                        <div class="col-md-6 table-responsive pt-3 px-1 float-left">
                          <table class="table table-bordered" id="myTable">
                            <tbody>
                                <tr>
                                    <th>Student ID</th>
                                    <td>
                                        <p class="d-inline">{{ $student->student_id }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Student</th>
                                    <td>
                                        <p class="d-inline">{{ $student->name }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Month</th>
                                    <td>
                                        <p class="d-inline">{{ $cashin->month }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Amount</th>
                                    <td>
                                        <p class="d-inline">{{ $cashin->total_fee }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Mobile</th>
                                    <td>
                                        <p class="d-inline">{{ $cashin->mobile }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Collected By</th>
                                    <td>
                                        <p class="d-inline">{{ $cashin->collected_by }}</p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Date</th>
                                    <td>
                                        <p class="d-inline">{{ date("d-m-Y",strtotime($cashin->created_at)) }}</p>
                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                        <div class="col-md-6 pt-3 px-1 float-right">
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12">
                                        <h5>Paid Batches</h5>
                                    </div>
                                    <table class="table table-bordered" id="batchTable">
                                        <tbody>
                                            @foreach (json_decode($cashin->paid_batches) as $index => $studentBatch)
                                            <div id="batch_{{$index}}" class="form-inline col-7">
                                                <div class="col-4">
                                                    <input class="form-control" name="paid_batches[{{$index}}][batch_name]" type="text" value="{{ $studentBatch->batch_name }}" readonly>
                                                </div>
                                                <div class="col-4">
                                                    <input class="form-control bpclass" id="batch_payment_{{$index}}" name="paid_batches[{{$index}}][batch_fee]" type="text" value="{{ $studentBatch->batch_fee }}">
                                                </div>
                                            </div>
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
    </div>
</div>
@endsection

@push('plugin-scripts')
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script> --}}

@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
