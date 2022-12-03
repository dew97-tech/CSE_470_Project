@extends('layouts.app')

@section('content')

{{-- Added Libraries for DatePicker --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- END --}}

<div class="container">
    <h2>Cash In</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('cashins.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <input type="hidden" name="student" value="{{ $student->id }}">
            <div class="col-6">
                {{-- search student option, turned off in favor of student payment --}}
                {{-- <label>Student</label>
                <input class="form-control col-12" list="students" name="student" placeholder="Search Student">
                <datalist id="students">
                    @foreach ($students as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </datalist> --}}
                <div class="form-group">
                    <label>Student</label>
                    <input class="form-control" type="text" value="{{ $student->name }}" readonly>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Month-Year</label>
                    <input type="text" class="form-control" name="month" id="month" />
                    <script>
                        $("#month").datepicker( {
                        format: "MM-yyyy",
                        startView: "months", 
                        minViewMode: "months",
                        orientation: "bottom"
                        });
                    </script>
                </div>
            </div>
            <div class="col-12" id="batches_list">
                <label>Batches</label>
                @if (count($studentBatches) <=0)  
                    <p><strong>Note: </strong>This student currently is not registered to any batch.</p>
                @endif

                @foreach ($studentBatches as $index => $studentBatch)
                <div id="batch_{{$index}}" class="form-inline col-7">
                    <input class="form-control" name="paid_batches[{{$index}}][batch_id]" type="hidden" value="{{ $studentBatch->id }}">
                    <div class="col-4">
                        <input class="form-control" name="paid_batches[{{$index}}][batch_name]" type="text" value="{{ $studentBatch->title }}" readonly>
                    </div>
                    <div class="col-4">
                        <input class="form-control bpclass" id="batch_payment_{{$index}}" name="paid_batches[{{$index}}][batch_fee]" type="text" value="{{ $studentBatch->fee }}">
                    </div>
                    <div class="col-4">
                        <a id="removeBatch_{{$index}}" class="rbclass btn btn-danger text-center mt-1">Remove</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-6 pt-2">
                <div class="form-group">
                    <label>Mobile Number of Payee</label>
                    <input class="form-control" name="mobile" type="text">
                </div>
            </div>
            <div class="col-6 pt-2">
                <div class="form-group">
                    <label>Collected By</label>
                    <input class="form-control" name="collected_by" type="text">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Total Amount</label>
                    <input class="form-control" id="total_payment" name="total_amount" type="number" readonly>
                </div>
            </div>
        </div>
        <button id="save" type="submit" class="btn btn-primary text-center mt-1"  onclick="return confirm('Please confirm this transaction?')" @click="save">Confirm</button>
    </form>
</div>
@endsection

@push('plugin-scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            calculate_total_payment();
        });

        document.addEventListener('click', function (event) {
            if (!event.target.matches('.rbclass')) return;

            event.preventDefault(); //cancel default action

            let target_id = event.target.id;
            let parent_id = target_id.replace("removeBatch", "batch");

            let remove_batch = document.getElementById(parent_id);
            let batch_list = document.getElementById('batches_list');
            batch_list.removeChild(remove_batch);

            calculate_total_payment();
        });

        document.addEventListener('change', function (event) {
            if (!event.target.matches('.bpclass')) return;

            event.preventDefault(); //cancel default action

            calculate_total_payment();
        });

        function calculate_total_payment() {
            let total_amount = 0;
            for (let index = 0; index < 10; index++) {
                if (document.getElementById('batch_payment_' + index)) {
                    let value = document.getElementById('batch_payment_' + index).value;
                    total_amount = total_amount + JSON.parse(value);
                }
            }
            document.getElementById('total_payment').value = total_amount;
        }
    </script>
@endpush
