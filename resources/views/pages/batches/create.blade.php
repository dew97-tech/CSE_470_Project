@extends('layouts.app')

@section('content')

<div class="container">
    <h2>New Batch</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('batches.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <label>Batch Name</label>
                    <input class="form-control" name="title" type="text" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Monthly Fee</label>
                    <input class="form-control" name="fee" type="number" required>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Subject</label>
                    <select name="subject" class="form-control selectpicker" required>
                        <option value="">Select Subject</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
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
                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label>Start Date</label>
                    <input class="form-control" name="start_date" type="date" required>
                </div>
            </div>
{{-- TimeStamp Start --}}
            <div class="col-6">
                <div class="form-group">
                    <label>Class Time</label>
                    <input class="form-control" name="timestamp" type="time" required>
                </div>
            </div>
{{-- TimeStamp End --}}
            {{-- <div class="col-6">
                <div class="form-group">
                    <label>Class Time (OLD)</label>
                    <select name="classtime" class="form-control selectpicker">
                        <option value="">Choose Class Time</option>
                        <option value="9AM">9:00AM</option>
                        <option value="930AM">9:30AM</option>
                        <option value="10AM">10:00AM</option>
                        <option value="1030AM">10:30AM</option>
                        <option value="11AM">11:00AM</option>
                        <option value="1130AM">11:30AM</option>
                        <option value="12PM">12:00PM</option>
                        <option value="1230PM">12:30PM</option>
                        <option value="1PM">1:00PM</option>
                        <option value="130PM">1:30PM</option>
                        <option value="2PM">2:00PM</option>
                        <option value="230PM">2:30PM</option>
                        <option value="3PM">3:00PM</option>
                        <option value="330PM">3:30PM</option>
                        <option value="4PM">4:00PM</option>
                        <option value="430PM">4:30PM</option>
                        <option value="5PM">5:00PM</option>
                        <option value="530PM">5:30PM</option>
                        <option value="6PM">6:00PM</option>
                        <option value="630PM">6:30PM</option>
                        <option value="7PM">7:00PM</option>
                        <option value="730PM">7:30PM</option>
                        <option value="8PM">8:00PM</option>
                    </select>
                </div>
            </div> --}}
            <div class="col-12">
                <div class="form-group">
                    <label>Days</label>
                    <div class="row">
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[sun]" type="checkbox">
                                    Sun
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[mon]" type="checkbox">
                                    Mon
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[tues]" type="checkbox">
                                    Tues
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[wed]" type="checkbox">
                                    Wed
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[thurs]" type="checkbox">
                                    Thurs
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[fri]" type="checkbox">
                                    Fri
                                </label>
                            </div>
                        </div>
                        <div class="col-1 form-inline">
                            <div class="form-check form-inline">
                                <label>
                                    <input class="form-check-input" name="days[sat]" type="checkbox">
                                    Sat
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Save</button>
    </form>
</div>
@endsection
