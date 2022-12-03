@extends('layouts.app')

@section('content')

<div class="container">
    <h2>New Subject</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('subjects.store') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Subject Name</label>
                    <input class="form-control" name="name" type="text">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control selectpicker">
                        <option value="">Select Level</option>
                        <option value="Junior">Junior</option>
                        <option value="O Level">O Level</option>
                        <option value="A Level">A Level</option>
                    </select>
                </div>
            </div>
        </div>
        
        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Save</button>
    </form>
</div>
@endsection