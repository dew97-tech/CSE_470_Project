@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Batch</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('batches.update', $batch->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Batch Name</label>
                    <input class="form-control" name="title" type="text" value="{{ $batch->title }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Monthly Fee</label>
                    <input class="form-control" name="fee" type="number" value="{{ $batch->fee }}" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Subject</label>
                    <select name="subject" class="form-control selectpicker" required>
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option {{ $batch->subject == $subject->id ? 'selected' : '' }} value="{{ $subject->id }}">{{ $subject->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Teacher</label>
                    <select name="teacher" class="form-control selectpicker" required>
                        <option value="">Select Teacher</option>
                        @foreach ($teachers as $teacher)
                            <option {{ $batch->teacher == $teacher->id ? 'selected' : '' }} value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Start Date</label>
                    <input class="form-control" name="start_date" type="date" value="{{ $batch->start_date }}" required>
                </div>
            </div>

            {{-- TimeStamp edit start --}}
            <div class="col-6">
                <div class="form-group">
                    <label>Class Time</label>
                    <input class="form-control" name="timestamp" type="time" value="{{ $batch->timestamp }}" required>
                </div>
            </div>
            {{-- Edit end --}}

            <div class="col-6">
                <div class="form-group">
                    <label>Class Time (OLD)</label>
                    <select name="classtime" class="form-control selectpicker">
                        <option value="">Choose Class Time</option>
                        <option {{ $batch->classtime == '9AM' ? 'selected' : '' }} value="9AM">9:00AM</option>
                        <option {{ $batch->classtime == '930AM' ? 'selected' : '' }} value="930AM">9:30AM</option>
                        <option {{ $batch->classtime == '10AM' ? 'selected' : '' }} value="10AM">10:00AM</option>
                        <option {{ $batch->classtime == '1030AM' ? 'selected' : '' }} value="1030AM">10:30AM</option>
                        <option {{ $batch->classtime == '11AM' ? 'selected' : '' }} value="11AM">11:00AM</option>
                        <option {{ $batch->classtime == '1130AM' ? 'selected' : '' }} value="1130AM">11:30AM</option>
                        <option {{ $batch->classtime == '12PM' ? 'selected' : '' }} value="12PM">12:00PM</option>
                        <option {{ $batch->classtime == '1230PM' ? 'selected' : '' }} value="1230PM">12:30PM</option>
                        <option {{ $batch->classtime == '1PM' ? 'selected' : '' }} value="1PM">1:00PM</option>
                        <option {{ $batch->classtime == '130PM' ? 'selected' : '' }} value="130PM">1:30PM</option>
                        <option {{ $batch->classtime == '2PM' ? 'selected' : '' }} value="2PM">2:00PM</option>
                        <option {{ $batch->classtime == '230PM' ? 'selected' : '' }} value="230PM">2:30PM</option>
                        <option {{ $batch->classtime == '3PM' ? 'selected' : '' }} value="3PM">3:00PM</option>
                        <option {{ $batch->classtime == '330PM' ? 'selected' : '' }} value="330PM">3:30PM</option>
                        <option {{ $batch->classtime == '4PM' ? 'selected' : '' }} value="4PM">4:00PM</option>
                        <option {{ $batch->classtime == '430PM' ? 'selected' : '' }} value="430PM">4:30PM</option>
                        <option {{ $batch->classtime == '5PM' ? 'selected' : '' }} value="5PM">5:00PM</option>
                        <option {{ $batch->classtime == '530PM' ? 'selected' : '' }} value="530PM">5:30PM</option>
                        <option {{ $batch->classtime == '6PM' ? 'selected' : '' }} value="6PM">6:00PM</option>
                        <option {{ $batch->classtime == '630PM' ? 'selected' : '' }} value="630PM">6:30PM</option>
                        <option {{ $batch->classtime == '7PM' ? 'selected' : '' }} value="7PM">7:00PM</option>
                        <option {{ $batch->classtime == '730PM' ? 'selected' : '' }} value="730PM">7:30PM</option>
                        <option {{ $batch->classtime == '8PM' ? 'selected' : '' }} value="8PM">8:00PM</option>
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label>Days</label>
                    <div class="row">
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[sun]" type="checkbox" {{ !empty(json_decode($batch->days)->sun) ? 'checked' : '' }}>
                                    Sun
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[mon]" type="checkbox" {{ !empty(json_decode($batch->days)->mon) ? 'checked' : '' }}>
                                    Mon
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[tues]" type="checkbox" {{ !empty(json_decode($batch->days)->tues) ? 'checked' : '' }}>
                                    Tues
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[wed]" type="checkbox" {{ !empty(json_decode($batch->days)->wed) ? 'checked' : '' }}>
                                    Wed
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[thurs]" type="checkbox" {{ !empty(json_decode($batch->days)->thurs) ? 'checked' : '' }}>
                                    Thurs
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[fri]" type="checkbox" {{ !empty(json_decode($batch->days)->fri) ? 'checked' : '' }}>
                                    Fri
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[sat]" type="checkbox" {{ !empty(json_decode($batch->days)->sat) ? 'checked' : '' }}>
                                    Sat
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Update</button>
    </form>
</div>
@endsection
