@extends('layouts.app')

@push('header-script')
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
@endpush
{{-- Added Libraries for DatePicker --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- END --}}
@section('content')
<div class="container">
    <h2>Edit Student</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group form-inline">
                            <label>Location</label>
                            <select name="location" class="form-control selectpicker ml-4" required>
                                <option value="WA" {{ $student->location == 'WA' ? 'selected' : '' }}>Wari</option>
                                <option value="DN" {{ $student->location == 'DN' ? 'selected' : '' }}>Dania</option>
                                <option value="ON" {{ $student->location == 'ON' ? 'selected' : '' }}>Online</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" type="text" value="{{ $student->name }}" required>
                        </div>
                    </div>
                    {{-- Date of Birth Fixed dd-MM-YYYY --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control" name="dob" id="dob" />
                            <script>
                                $("#dob").datepicker( {
                                format: "dd-MM-yyyy",
                                startView: "days", 
                                minViewMode: "days",
                                orientation: "bottom"
                                });
                            </script>
                        </div>
                    </div>
                    {{-- END --}}
                    <div class="col-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input name="photo" class="form-control" id="photo" style="display: none;" type="text" value="{{ !empty($student->photo) ? $student->photo : '' }}">
                            <img id="upload_widget_1" class="upload-button" src="{{ !empty($student->photo) ? $student->photo : '/assets/img/upload.png' }}" style="max-width:150px; max-height:150px; cursor:pointer;" onclick="openImageUploader()">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" value="Male" {{ $student->gender == 'Male' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                Male
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="gender" value="Female" {{ $student->gender == 'Female' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="blood_group">
                                <option value="A+" {{ $student->blood_group == 'A+' ? 'selected' : '' }}>A+</option>
                                <option value="A-" {{ $student->blood_group == 'A-' ? 'selected' : '' }}>A-</option>
                                <option value="B+" {{ $student->blood_group == 'B+' ? 'selected' : '' }}>B+</option>
                                <option value="B-" {{ $student->blood_group == 'B-' ? 'selected' : '' }}>B-</option>
                                <option value="O+" {{ $student->blood_group == 'O+' ? 'selected' : '' }}>O+</option>
                                <option value="O-" {{ $student->blood_group == 'O-' ? 'selected' : '' }}>O-</option>
                                <option value="AB+" {{ $student->blood_group == 'AB+' ? 'selected' : '' }}>AB+</option>
                                <option value="AB-" {{ $student->blood_group == 'AB-' ? 'selected' : '' }}>AB-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" type="text" value="{{ $student->phone }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email" value="{{ $student->email }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Address</label>
                            <input class="form-control" name="address" type="text" value="{{ $student->address }}" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Father's Name</label>
                            <input class="form-control" name="father_name" type="text" value="{{ $student->father_name }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Father's Phone No</label>
                            <input class="form-control" name="father_no" type="text" value="{{ $student->father_no }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Mother's Name</label>
                            <input class="form-control" name="mother_name" type="text" value="{{ $student->mother_name }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Mother's Phone No</label>
                            <input class="form-control" name="mother_no" type="text" value="{{ $student->mother_no }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Father/Mother/Parent's Office Address</label>
                            <input class="form-control" name="parent_office_address" type="text" value="{{ $student->parent_office_address }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Other Parent</label>
                            <input class="form-control" name="parent" type="text" value="{{ $student->parent }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Other Parent's Phone No</label>
                            <input class="form-control" name="parent_phone" type="text" value="{{ $student->parent_phone }}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <label>Choose Your Subjects</label>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[english]" type="checkbox" {{ !empty(json_decode($student->subjects)->english) ? 'checked' : '' }}>
                            <label>English Language</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[bangla]" type="checkbox" {{ !empty(json_decode($student->subjects)->bangla) ? 'checked' : '' }}>
                            <label>Bangla</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[maths_a]" type="checkbox" {{ !empty(json_decode($student->subjects)->maths_a) ? 'checked' : '' }}>
                            <label>Mathematics A</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[maths_b]" type="checkbox" {{ !empty(json_decode($student->subjects)->maths_b) ? 'checked' : '' }}>
                            <label>Mathematics B (Edexcel)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[maths_d]" type="checkbox" {{ !empty(json_decode($student->subjects)->maths_d) ? 'checked' : '' }}>
                            <label>Mathematics D (CAIE)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[pure_maths]" type="checkbox" {{ !empty(json_decode($student->subjects)->pure_maths) ? 'checked' : '' }}>
                            <label>Pure Mathematics (Edexcel)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[add_maths]" type="checkbox" {{ !empty(json_decode($student->subjects)->add_maths) ? 'checked' : '' }}>
                            <label>Additional Mathematics (CAIE)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[physics]" type="checkbox" {{ !empty(json_decode($student->subjects)->physics) ? 'checked' : '' }}>
                            <label>Physics</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[chemistry]" type="checkbox" {{ !empty(json_decode($student->subjects)->chemistry) ? 'checked' : '' }}>
                            <label>Chemistry</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[biology]" type="checkbox" {{ !empty(json_decode($student->subjects)->biology) ? 'checked' : '' }}>
                            <label>Biology</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[human_biology]" type="checkbox" {{ !empty(json_decode($student->subjects)->human_biology) ? 'checked' : '' }}>
                            <label>Human Biology</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[accounting]" type="checkbox" {{ !empty(json_decode($student->subjects)->accounting) ? 'checked' : '' }}>
                            <label>Accounting</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[economics]" type="checkbox" {{ !empty(json_decode($student->subjects)->economics) ? 'checked' : '' }}>
                            <label>Economics</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[commerce]" type="checkbox" {{ !empty(json_decode($student->subjects)->commerce) ? 'checked' : '' }}>
                            <label>Commerce</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[business_studies]" type="checkbox" {{ !empty(json_decode($student->subjects)->business_studies) ? 'checked' : '' }}>
                            <label>Business Studies</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[p_one_two]" type="checkbox" {{ !empty(json_decode($student->subjects)->p_one_two) ? 'checked' : '' }}>
                            <label>P1, P2</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[p_three_four]" type="checkbox" {{ !empty(json_decode($student->subjects)->p_three_four) ? 'checked' : '' }}>
                            <label>P3, P4</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[mechanics_one]" type="checkbox" {{ !empty(json_decode($student->subjects)->mechanics_one) ? 'checked' : '' }}>
                            <label>Mechanics 1</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[mechanics_two]" type="checkbox" {{ !empty(json_decode($student->subjects)->mechanics_two) ? 'checked' : '' }}>
                            <label>Mechanics 2</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[statistics_one]" type="checkbox" {{ !empty(json_decode($student->subjects)->statistics_one) ? 'checked' : '' }}>
                            <label>Statistics 1</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[all_subjects]" type="checkbox" {{ !empty(json_decode($student->subjects)->all_subjects) ? 'checked' : '' }}>
                            <label>All School subjects (for pre O Levels)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[ict]" type="checkbox" {{ !empty(json_decode($student->subjects)->ict) ? 'checked' : '' }}>
                            <label>ICT</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[other]" type="checkbox" {{ !empty(json_decode($student->subjects)->other) ? 'checked' : '' }}>
                            <label>Other</label>                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Other</label>
                            <input class="form-control" name="subjects[other_text]" type="text" value="{{ !empty(json_decode($student->subjects)->other_text) ? json_decode($student->subjects)->other_text : '' }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Previous/Current Educational Institution:</label>
                            <input class="form-control" name="prev_institution" type="text" value="{{ $student->prev_institution }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Current grade: (tentetive, if not in school)</label>
                            <input class="form-control" name="current_grade" type="text" value="{{ $student->current_grade }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Which is your preffered syllabus?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="preferred_syllabus" value="Pearson Edexcel" {{ $student->preferred_syllabus == 'Pearson Edexcel' ? 'checked' : '' }} required>
                            <label class="form-check-label">
                                Pearson Edexcel
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="preferred_syllabus" value="Cambridge Assessment International Education (CAIE)" {{ $student->preferred_syllabus == 'Cambridge Assessment International Education (CAIE)' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                Cambridge Assessment International Education (CAIE)
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="preferred_syllabus" value="School Curriculum" {{ $student->preferred_syllabus == 'School Curriculum' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                School Curriculum
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Which level are you enrolling for?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="enrolling_level" value="Junior Section" {{ $student->enrolling_level == 'Junior Section' ?  'checked' : '' }} required>
                            <label class="form-check-label">
                                Junior Section
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="enrolling_level" value="Pre O Levels" {{ $student->enrolling_level == 'Pre O Levels' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                Pre O Levels
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="enrolling_level" value="IGCSE (O Levels)" {{ $student->enrolling_level == 'IGCSE (O Levels)' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                IGCSE (O Levels)
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="enrolling_level" value="IAL (AS Level)" {{ $student->enrolling_level == 'IAL (AS Level)' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                IAL (AS Level)
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="enrolling_level" value="IAL (A2 Level)" {{ $student->enrolling_level == 'IAL (A2 Level)' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                IAL (A2 Level)
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-inline">
                            <label>How did you hear about us?</label>
                            <select name="source" class="form-control selectpicker ml-2">
                                <option value="Word of Mouth" {{ $student->source == 'Word of Mouth' ? 'selected' : '' }}>Word of Mouth</option>
                                <option value="Website" {{ $student->source == 'Website' ? 'selected' : '' }}>Website</option>
                                <option value="Facebook" {{ $student->source == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="Google" {{ $student->source == 'Google' ? 'selected' : '' }}>Google</option>
                                <option value="Flyers" {{ $student->source == 'Flyers' ? 'selected' : '' }}>Flyers</option>
                                <option value="SMS" {{ $student->source == 'SMS' ? 'selected' : '' }}>SMS</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button id="save" type="submit" class="btn btn-primary text-center mb-2" @click="save">Save</button>
    </form>
</div>
@endsection

@push('plugin-scripts')
<!-- Plugin js import here -->
<script>
    var openImageUploader = function() {
        var cloudinaryWidget = cloudinary.createUploadWidget({
                cloudName: 'augmenta',
                uploadPreset: 'augmenta_student_photo',
                maxImageFileSize: 1000000
            },
            (error, result) => {
                if (!error && result && result.event === "success") {
                    let oldVal = document.getElementById("photo").value;
                    let val = oldVal ? oldVal + ',' + result.info.secure_url : result.info.secure_url;
                    document.getElementById("photo").value = result.info.secure_url;
                    document.getElementById("upload_widget_1").src = result.info.secure_url;
                }
            })
        cloudinaryWidget.open();
    }
</script>
@endpush

@push('custom-scripts')
<!-- Custom js here -->
@endpush
