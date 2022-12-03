@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Cash Out</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('cashouts.update', $cashOut->id) }}" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Name of Payee</label>
                    <input class="form-control" name="nameofpayee" type="text" value="{{ $cashOut->name_of_payee }}">
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
                    <input class="form-control" name="description" type="text" value="{{ $cashOut->description }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Amount</label>
                    <input class="form-control" name="amount" type="text" value="{{ $cashOut->amount}}">
                </div>
            </div>
        </div>
        
        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Update</button>
    </form>
</div>
@endsection