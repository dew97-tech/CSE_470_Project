@extends('layouts.app')

@section('title', 'CashIns')

@push('plugin-styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endpush

@section('content')
<div id="cashins">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Cash Ins</h6>
                        {{-- <a id="create-new" type="button" class="btn btn-primary float-right" href="{{route('cashins.create')}}">Add New</a> --}}
                        <div class="table-responsive pt-3 px-1">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student</th>
                                        <th>Receipt No</th>
                                        <th>Collected By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($cashIns as $index => $cashIn)
                                    <tr>
                                        <td>{{ $index++ + 1 }}</td>
                                        <td>{{ $cashIn->cashinStudent->name }}</td>
                                        <td>{{ $cashIn->receipt_no }}</td>
                                        <td>{{ $cashIn->collected_by }}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('cashins.show', $cashIn->id) }}">
                                                <span class="glyphicon glyphicon-edit">Details</span>
                                            </a>
                                            {{-- <a class="btn btn-secondary" href="{{route('cashins.edit', $cashIn->id)}}">
                                                <span class="glyphicon glyphicon-edit">Edit</span>
                                            </a> --}}
                                            {{-- <a class="btn btn-primary" href="{{route('cashins.destroy', $cashIn->id)}}" onclick="return confirm('Are you sure?')">
                                                <span class="glyphicon glyphicon-trash">Delete</span>
                                            </a> --}}
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
