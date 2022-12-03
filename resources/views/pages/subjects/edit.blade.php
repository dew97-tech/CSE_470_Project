@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Subject</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('subjects.update', $subject->id) }}" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Subject Name</label>
                    <input class="form-control" name="name" type="text" value="{{ $subject->name }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Level</label>
                    <select name="level" class="form-control selectpicker">
                        <option value="">Select Level</option>
                        <option value="Junior" {{ $subject->level == 'Junior' ? 'selected' : '' }}>Junior</option>
                        <option value="O Level"{{ $subject->level == 'O Level' ? 'selected' : '' }}>O Level</option>
                        <option value="A Level"{{ $subject->level == 'A Level' ? 'selected' : '' }}>A Level</option>
                    </select>
                </div>
            </div>
        </div>
        
        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Save</button>
    </form>
</div>
@endsection