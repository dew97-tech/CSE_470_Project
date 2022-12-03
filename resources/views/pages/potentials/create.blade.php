@extends('layouts.app')

@section('content')

<div class="container">
    <h2>New Potential</h2>
    <br>
    <form class='form-horizontal' method="POST" action="{{ route('potentials.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Full Name</label>
                            <input class="form-control" name="name" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Previous/Current Educational Institution:</label>
                            <input class="form-control" name="prev_institution" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <label>Which level are you enrolling for?</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="Junior Section">
                                Junior Section
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="Pre O Levels">
                                Pre O Levels
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="IGCSE (O Levels)">
                                IGCSE (O Levels)
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="IAL (AS Level)">
                                IAL (AS Level)
                            </label>
                            <br>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="enrolling_level" value="IAL (A2 Level)">
                                IAL (A2 Level)
                            </label>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Exam Batch/Session</label>
                            <input class="form-control" name="exam_batch_session" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Phone</label>
                            <input class="form-control" name="phone" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Parent Phone</label>
                            <input class="form-control" name="parent_phone" type="text">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>How did you hear about us?</label>
                            <select name="source" class="form-control selectpicker ml-2">
                                <option value="Word of Mouth">Word of Mouth</option>
                                <option value="Website">Website</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Google">Google</option>
                                <option value="Flyers">Flyers</option>
                                <option value="SMS">SMS</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Current grade: (tentetive, if not in school)</label>
                            <input class="form-control" name="current_grade" type="text">
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
                            <label>
                                <input class="form-check-input ml-3" name="subjects[english]" type="checkbox">
                                English Language
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[bangla]" type="checkbox">
                                Bangla
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[maths_a]" type="checkbox">
                                Mathematics A
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[maths_b]" type="checkbox">
                                Mathematics B (Edexcel)
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[maths_d]" type="checkbox">
                                Mathematics D (CAIE)
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[pure_maths]" type="checkbox">
                                Pure Mathematics (Edexcel)
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[add_maths]" type="checkbox">
                                Additional Mathematics (CAIE)
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[physics]" type="checkbox">
                                Physics
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[chemistry]" type="checkbox">
                                Chemistry
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[biology]" type="checkbox">
                                Biology
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[human_biology]" type="checkbox">
                                Human Biology
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[accounting]" type="checkbox">
                                Accounting
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[economics]" type="checkbox">
                                Economics
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[commerce]" type="checkbox">
                                Commerce
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[business_studies]" type="checkbox">
                                Business Studies
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[p_one_two]" type="checkbox">
                                P1, P2
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[p_three_four]" type="checkbox">
                                P3, P4
                            </label>                            
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[mechanics_one]" type="checkbox">
                                Mechanics 1
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[mechanics_two]" type="checkbox">
                                Mechanics 2
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[statistics_one]" type="checkbox">
                                Statistics 1
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[all_subjects]" type="checkbox">
                                All School subjects (for pre O Levels)
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[ict]" type="checkbox">
                                ICT
                            </label>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-check form-inline">
                            <label>
                                <input class="form-check-input ml-3" name="subjects[other]" id="otherRadio" type="checkbox" onclick="javascript:otherCheck();" >
                                Other
                            </label>
                        </div>
                    </div>
                    <div class="col-6" id="otherField" style="visibility:hidden">
                        <div class="form-group">
                            <label>Other</label>
                            <input class="form-control" name="subjects[other_text]" type="text">
                        </div>
                    </div>
                </div>
            </div>
        </div>        
        <button id="save" type="submit" class="btn btn-primary text-center mt-1" @click="save">Save</button>
    </form>
</div>

<!-- Hide Other text field -->
<script>
    function otherCheck() {
        if (document.getElementById('otherRadio').checked) {
            document.getElementById('otherField').style.visibility = 'visible';
        }
        else document.getElementById('otherField').style.visibility = 'hidden';
    }
</script>
@endsection