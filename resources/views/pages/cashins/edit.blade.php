@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Cash In</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('cashins.update', $cashin->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
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
                    <label>Month</label>
                    <select name="month" class="form-control selectpicker">
                        <option value="">Select Month</option>
                        <option value="January" {{ $cashin->month == 'January' ? 'selected' : ''}}>January</option>
                        <option value="February" {{ $cashin->month == 'February' ? 'selected' : ''}}>February</option>
                        <option value="March" {{ $cashin->month == 'March' ? 'selected' : ''}}>March</option>
                        <option value="April" {{ $cashin->month == 'April' ? 'selected' : ''}}>April</option>
                        <option value="May" {{ $cashin->month == 'May' ? 'selected' : ''}}>May</option>
                        <option value="June" {{ $cashin->month == 'June' ? 'selected' : ''}}>June</option>
                        <option value="July" {{ $cashin->month == 'July' ? 'selected' : ''}}>July</option>
                        <option value="August" {{ $cashin->month == 'August' ? 'selected' : ''}}>August</option>
                        <option value="September" {{ $cashin->month == 'September' ? 'selected' : ''}}>September</option>
                        <option value="October" {{ $cashin->month == 'October' ? 'selected' : ''}}>October</option>
                        <option value="November" {{ $cashin->month == 'November' ? 'selected' : ''}}>November</option>
                        <option value="December" {{ $cashin->month == 'December' ? 'selected' : ''}}>December</option>
                    </select>
                </div>
            </div>
            <div class="col-12" id="batches_list">
                <label>Batches</label>
                @foreach (json_decode($cashin->paid_batches) as $index => $studentBatch)
                <div id="batch_{{$index}}" class="form-inline col-7">
                    <input class="form-control" name="paid_batches[{{$index}}][batch_id]" type="hidden" value="{{ $studentBatch->batch_id }}">
                    <div class="col-4">
                        <input class="form-control" name="paid_batches[{{$index}}][batch_name]" type="text" value="{{ $studentBatch->batch_name }}" readonly>
                    </div>
                    <div class="col-4">
                        <input class="form-control bpclass" id="batch_payment_{{$index}}" name="paid_batches[{{$index}}][batch_fee]" type="text" value="{{ $studentBatch->batch_fee }}">
                    </div>
                    <div class="col-4">
                        <a id="removeBatch_{{$index}}" class="rbclass btn btn-danger text-center mt-1">Remove</a>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Mobile</label>
                    <input class="form-control" name="mobile" type="text" value="{{ $cashin->mobile }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Collected By</label>
                    <input class="form-control" name="collected_by" type="text" value="{{ $cashin->collected_by }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Total Amount</label>
                    <input class="form-control" id="total_payment" name="total_amount" type="number" value="{{ $cashin->total_fee }}" readonly>
                </div>
            </div>
        </div>
        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Save</button>
    </form>
</div>
@endsection

@push('plugin-scripts')
    <script>
        // document.addEventListener("DOMContentLoaded", function() {
        //     calculate_total_payment();
        // });

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

        // function to calculate total fee of all the visible batches fees
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
