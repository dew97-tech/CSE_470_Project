@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Teacher</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('teachers.update', $teacher->id) }}" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" type="text" value="{{ $teacher->name }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Phone</label>
                    <input class="form-control" name="phone" type="text" value="{{ $teacher->phone }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" type="text" value="{{ $teacher->email }}">
                </div>
            </div>
            {{-- <div class="col-6">
                <div class="form-group">
                    <label>Subject</label>
                    <select name="subject" class="form-control selectpicker">
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option {{ $teacher->subject == $subject->name ? 'selected' : '' }} value="{{ $subject->name }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
        </div>
        
        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Update</button>
    </form>
</div>
@endsection