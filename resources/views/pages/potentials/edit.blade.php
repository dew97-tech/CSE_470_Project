@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Edit Potential</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('potentials.update', $potential->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control" name="name" type="text" value="{{ $potential->name }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Previous/Current Educational Institution:</label>
                            <input class="form-control" name="prev_institution" type="text" value="{{ $potential->prev_institution }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Which level are you enrolling for?</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="enrolling_level" value="Junior Section" {{ $potential->enrolling_level == 'Junior Section' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                Junior Section
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="enrolling_level" value="Pre O Levels" {{ $potential->enrolling_level == 'Pre O Levels' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                Pre O Levels
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="enrolling_level" value="IGCSE (O Levels)" {{ $potential->enrolling_level == 'IGCSE (O Levels)' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                IGCSE (O Levels)
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="enrolling_level" value="IAL (AS Level)" {{ $potential->enrolling_level == 'IAL (AS Level)' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                IAL (AS Level)
                            </label>
                            <br>
                            <input class="form-check-input" type="radio" name="enrolling_level" value="IAL (A2 Level)" {{ $potential->enrolling_level == 'IAL (A2 Level)' ?  'checked' : '' }}>
                            <label class="form-check-label">
                                IAL (A2 Level)
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Exam Batch/Session</label>
                            <input class="form-control" name="exam_batch_session" type="text" value="{{ $potential->exam_batch_session }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" type="text" value="{{ $potential->phone }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Parent Phone</label>
                            <input class="form-control" name="parent_phone" type="text" value="{{ $potential->parent_phone }}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>How did you hear about us?</label>
                            <select name="source" class="form-control selectpicker ml-2">
                                <option value="Word of Mouth" {{ $potential->source == 'Word of Mouth' ? 'selected' : '' }}>Word of Mouth</option>
                                <option value="Website" {{ $potential->source == 'Website' ? 'selected' : '' }}>Website</option>
                                <option value="Facebook" {{ $potential->source == 'Facebook' ? 'selected' : '' }}>Facebook</option>
                                <option value="Google" {{ $potential->source == 'Google' ? 'selected' : '' }}>Google</option>
                                <option value="Flyers" {{ $potential->source == 'Flyers' ? 'selected' : '' }}>Flyers</option>
                                <option value="SMS" {{ $potential->source == 'SMS' ? 'selected' : '' }}>SMS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Current grade: (tentetive, if not in school)</label>
                            <input class="form-control" name="current_grade" type="text" value="{{ $potential->current_grade }}">
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
                            <input class="form-check-input ml-3" name="subjects[english]" type="checkbox" {{ !empty(json_decode($potential->subjects)->english) ? 'checked' : '' }}>
                            <label>English Language</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[bangla]" type="checkbox" {{ !empty(json_decode($potential->subjects)->bangla) ? 'checked' : '' }}>
                            <label>Bangla</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[maths_a]" type="checkbox" {{ !empty(json_decode($potential->subjects)->maths_a) ? 'checked' : '' }}>
                            <label>Mathematics A</label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[maths_b]" type="checkbox" {{ !empty(json_decode($potential->subjects)->maths_b) ? 'checked' : '' }}>
                            <label>Mathematics B (Edexcel)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[maths_d]" type="checkbox" {{ !empty(json_decode($potential->subjects)->maths_d) ? 'checked' : '' }}>
                            <label>Mathematics D (CAIE)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[pure_maths]" type="checkbox" {{ !empty(json_decode($potential->subjects)->pure_maths) ? 'checked' : '' }}>
                            <label>Pure Mathematics (Edexcel)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[add_maths]" type="checkbox" {{ !empty(json_decode($potential->subjects)->add_maths) ? 'checked' : '' }}>
                            <label>Additional Mathematics (CAIE)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[physics]" type="checkbox" {{ !empty(json_decode($potential->subjects)->physics) ? 'checked' : '' }}>
                            <label>Physics</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[chemistry]" type="checkbox" {{ !empty(json_decode($potential->subjects)->chemistry) ? 'checked' : '' }}>
                            <label>Chemistry</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[biology]" type="checkbox" {{ !empty(json_decode($potential->subjects)->biology) ? 'checked' : '' }}>
                            <label>Biology</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[human_biology]" type="checkbox" {{ !empty(json_decode($potential->subjects)->human_biology) ? 'checked' : '' }}>
                            <label>Human Biology</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[accounting]" type="checkbox" {{ !empty(json_decode($potential->subjects)->accounting) ? 'checked' : '' }}>
                            <label>Accounting</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[economics]" type="checkbox" {{ !empty(json_decode($potential->subjects)->economics) ? 'checked' : '' }}>
                            <label>Economics</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[commerce]" type="checkbox" {{ !empty(json_decode($potential->subjects)->commerce) ? 'checked' : '' }}>
                            <label>Commerce</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[business_studies]" type="checkbox" {{ !empty(json_decode($potential->subjects)->business_studies) ? 'checked' : '' }}>
                            <label>Business Studies</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[p_one_two]" type="checkbox" {{ !empty(json_decode($potential->subjects)->p_one_two) ? 'checked' : '' }}>
                            <label>P1, P2</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[p_three_four]" type="checkbox" {{ !empty(json_decode($potential->subjects)->p_three_four) ? 'checked' : '' }}>
                            <label>P3, P4</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[mechanics_one]" type="checkbox" {{ !empty(json_decode($potential->subjects)->mechanics_one) ? 'checked' : '' }}>
                            <label>Mechanics 1</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[mechanics_two]" type="checkbox" {{ !empty(json_decode($potential->subjects)->mechanics_two) ? 'checked' : '' }}>
                            <label>Mechanics 2</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[statistics_one]" type="checkbox" {{ !empty(json_decode($potential->subjects)->statistics_one) ? 'checked' : '' }}>
                            <label>Statistics 1</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[all_subjects]" type="checkbox" {{ !empty(json_decode($potential->subjects)->all_subjects) ? 'checked' : '' }}>
                            <label>All School subjects (for pre O Levels)</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[ict]" type="checkbox" {{ !empty(json_decode($potential->subjects)->ict) ? 'checked' : '' }}>
                            <label>ICT</label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <input class="form-check-input ml-3" name="subjects[other]" type="checkbox" {{ !empty(json_decode($potential->subjects)->other) ? 'checked' : '' }}>
                            <label>Other</label>                            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Other</label>
                            <input class="form-control" name="subjects[other_text]" type="text" value="{{ !empty(json_decode($potential->subjects)->other_text) ? json_decode($potential->subjects)->other_text : '' }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Save</button>
    </form>
</div>
@endsection