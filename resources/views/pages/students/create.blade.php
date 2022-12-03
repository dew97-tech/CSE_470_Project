@extends('layouts.app')

@push('header-script')
<script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
@endpush
{{-- Added Libraries for DatePicker --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- END --}}
{{-- asterisk added --}}
<style>
    .required:after {
      content:" *";
      color: red;
      padding-left: 4px;
    }
  </style>
{{-- END --}}
@section('content')
<div class="container">
    <h2>New Student</h2>
    <br>
    <style>
        .required:after {
        color: red;
        content: "*";
        }
    </style>
    <form class='form-horizontal' method="POST" action="{{ route('students.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group form-inline">
                            <label class="required">Location</label>
                            <select name="location" class="form-control selectpicker ml-4" required>
                                <option value="WA">Wari</option>
                                <option value="DN">Dania</option>
                                <option value="ON">Online</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required">Full Name</label>
                            <input class="form-control" name="name" type="text" value="{{ isset($potential) ? $potential->name : '' }}" required>
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
                            <input name="photo" class="form-control" id="photo" style="display: none;" type="text" value="">
                            <img id="upload_widget_1" class="upload-button" src="/assets/img/upload.png" style="max-width:150px; max-height:150px; cursor:pointer;" onclick="openImageUploader()">
                        </div>
                    </div>
                    <div class="col-6">
                        <label>Gender</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value="Male">
                                Male
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="gender" value="Female">
                                Female
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="blood_group">
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required">Phone</label>
                            <input class="form-control" name="phone" type="text" value="{{ isset($potential) ? $potential->phone : '' }}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control" name="email" type="email">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required">Address</label>
                            <input class="form-control" name="address" type="text" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required">Father's Name</label>
                            <input class="form-control" name="father_name" type="text" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Father's Phone No</label>
                            <input class="form-control" name="father_no" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label class="required">Mother's Name</label>
                            <input class="form-control" name="mother_name" type="text" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Mother's Phone No</label>
                            <input class="form-control" name="mother_no" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Father/Mother/Parent's Office Address</label>
                            <input class="form-control" name="parent_office_address" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Other Parent</label>
                            <input class="form-control" name="parent" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Other Parent's Phone No</label>
                            <input class="form-control" name="parent_phone" type="text" value="{{ isset($potential) ? $potential->parent_phone : '' }}">
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-12">
                        <label class="required">Choose Your Subjects</label>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[english]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->english) ? 'checked' : '' }}>
                                English Language
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[bangla]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->bangla) ? 'checked' : '' }}>
                                Bangla
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[maths_a]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->maths_a) ? 'checked' : '' }}>
                                Mathematics A
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[maths_b]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->maths_b) ? 'checked' : '' }}>
                                Mathematics B (Edexcel)
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[maths_d]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->maths_d) ? 'checked' : '' }}>
                                Mathematics D (CAIE)
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[pure_maths]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->pure_maths) ? 'checked' : '' }}>
                                Pure Mathematics (Edexcel)
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[add_maths]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->add_maths) ? 'checked' : '' }}>
                                Additional Mathematics (CAIE)
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[physics]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->physics) ? 'checked' : '' }}>
                                Physics
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[chemistry]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->chemistry) ? 'checked' : '' }}>
                                Chemistry
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[biology]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->biology) ? 'checked' : '' }}>
                                Biology
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[human_biology]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->human_biology) ? 'checked' : '' }}>
                                Human Biology
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[accounting]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->accounting) ? 'checked' : '' }}>
                                Accounting
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[economics]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->economics) ? 'checked' : '' }}>
                                Economics
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[commerce]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->commerce) ? 'checked' : '' }}>
                                Commerce
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[business_studies]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->business_studies) ? 'checked' : '' }}>
                                Business Studies
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[p_one_two]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->p_one_two) ? 'checked' : '' }}>
                                P1, P2
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[p_three_four]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->p_three_four) ? 'checked' : '' }}>
                                P3, P4
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[mechanics_one]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->mechanics_one) ? 'checked' : '' }}>
                                Mechanics 1
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[mechanics_two]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->mechanics_two) ? 'checked' : '' }}>
                                Mechanics 2
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[statistics_one]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->statistics_one) ? 'checked' : '' }}>
                                Statistics 1
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[all_subjects]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->all_subjects) ? 'checked' : '' }}>
                                All School subjects (for pre O Levels)
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[ict]" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->ict) ? 'checked' : '' }}>
                                ICT
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[other]" id="otherRadio" onclick="javascript:otherCheck();" type="checkbox" {{ isset($potential) && !empty(json_decode($potential->subjects)->other) ? 'checked' : '' }}>
                                Other
                            </label>                            
                        </div>
                    </div>
                    <div class="col-6" id="otherField" style="visibility:hidden">
                        <div class="form-group">
                            <label>Other</label>
                            <input class="form-control" name="subjects[other_text]" type="text" value="{{ isset($potential) && !empty(json_decode($potential->subjects)->other_text) ? json_decode($potential->subjects)->other_text : '' }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Previous/Current Educational Institution:</label>
                            <input class="form-control" name="prev_institution" type="text" value="{{ isset($potential) ? $potential->prev_institution : '' }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Current grade: (tentetive, if not in school)</label>
                            <input class="form-control" name="current_grade" type="text" value="{{ isset($potential) ? $potential->current_grade : '' }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="required">Which is your preffered syllabus?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="preferred_syllabus" value="Pearson Edexcel" {{ isset($potential) && $potential->preferred_syllabus == 'Pearson Edexcel' ? 'checked' : '' }} required>
                                Pearson Edexcel
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="preferred_syllabus" value="Cambridge Assessment International Education (CAIE)" {{ isset($potential) && $potential->preferred_syllabus == 'Cambridge Assessment International Education (CAIE)' ? 'checked' : '' }}>
                                Cambridge Assessment International Education (CAIE)
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="preferred_syllabus" value="School Curriculum" {{ isset($potential) && $potential->preferred_syllabus == 'School Curriculum' ? 'checked' : '' }}>
                                School Curriculum
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="required">Which level are you enrolling for?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="Junior Section" {{ isset($potential) && $potential->enrolling_level == 'Junior Section' ?  'checked' : '' }} required>
                                Junior Section
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="Pre O Levels" {{ isset($potential) && $potential->enrolling_level == 'Pre O Levels' ?  'checked' : '' }}>
                                Pre O Levels
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="IGCSE (O Levels)" {{ isset($potential) && $potential->enrolling_level == 'IGCSE (O Levels)' ?  'checked' : '' }}>
                                IGCSE (O Levels)
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="IAL (AS Level)" {{ isset($potential) && $potential->enrolling_level == 'IAL (AS Level)' ?  'checked' : '' }}>
                                IAL (AS Level)
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="IAL (A2 Level)" {{ isset($potential) && $potential->enrolling_level == 'IAL (A2 Level)' ?  'checked' : '' }}>
                                IAL (A2 Level)
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group form-inline">
                            <label>How did you hear about us?</label>
                            <select name="source" class="form-control selectpicker ml-2">
                                <option value="Word of Mouth" {{ isset($potential->source) && $potential->source == 'Word of Mouth' ? 'selected' : '' }}>Word of Mouth</option>
                                <option value="Website" {{ isset($potential->source) && $potential->source == 'Website' ? 'selected' : '' }}>Website</option>
                                <option value="Facebook" {{ isset($potential->source) && $potential->source == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="Google" {{ isset($potential->source) && $potential->source == 'Google' ? 'selected' : '' }}>Google</option>
                                <option value="Flyers" {{ isset($potential->source) && $potential->source == 'Flyers' ? 'selected' : '' }}>Flyers</option>
                                <option value="SMS" {{ isset($potential->source) && $potential->source == 'SMS' ? 'selected' : '' }}>SMS</option>
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
<!-- Hide Other text field -->
<script>
    function otherCheck() {
        if (document.getElementById('otherRadio').checked) {
            document.getElementById('otherField').style.visibility = 'visible';
        }
        else document.getElementById('otherField').style.visibility = 'hidden';
    }
</script>
@endpush