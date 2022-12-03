@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Cash Outs</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('cashouts.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Name of Payee</label>
                    <input class="form-control" type="text" name="nameofpayee" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Purpose</label>
                    <select name="purpose" class="form-control selectpicker" required>
                        <option value="">Select Purpose</option>
                        <option value="Conveyance">Conveyance</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Bills & Utility">Bills & Utility</option>
                        <option value="Staff Salary">Staff Salary</option>
                        <option value="Supplies">Supplies</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Description</label>
                    <input class="form-control" type="text"  name="description" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Amount</label>
                    <input class="form-control" id="amount" name="amount" type="decimal" required>
                </div>
            </div>
        </div>
        <button id="save" type="submit" class="btn btn-primary text-center mt-1"  onclick="return confirm('Please confirm this transaction?')" @click="save">Confirm</button>
    </form>
</div>
@endsection