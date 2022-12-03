<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($status = 1)
    {
        $students = Student::where('status', $status)->get();
        return view('pages.students.index', compact('students', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = Student::create([
            'status' => 1,
            'location' => $request['location'],
            'name' => $request['name'],
            'dob' => $request['dob'],
            'gender' => $request['gender'],
            'blood_group' => $request['blood_group'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'address' => $request['address'],
            'father_name' => $request['father_name'],
            'father_no' => $request['father_no'],
            'mother_name' => $request['mother_name'],
            'mother_no' => $request['mother_no'],
            'parent_office_address'  => $request['parent_office_address'],
            'parent'  => $request['parent'],
            'parent_phone'  => $request['parent_phone'],
            'subjects'  => json_encode($request['subjects']),
            'prev_institution'  => $request['prev_institution'],
            'current_grade'  => $request['current_grade'],
            'preferred_syllabus'  => $request['preferred_syllabus'],
            'enrolling_level'  => $request['enrolling_level'],
            'source'  => $request['source'],
            'photo'  => !empty($request['photo']) ? $request['photo'] : '',
            // 'student_sign'  => !empty($request['student_sign']) ? $request['student_sign'] : '',
            // 'parent_sign'  => !empty($request['parent_sign']) ? $request['parent_sign'] : '',
            // 'counsellor_sign'  => !empty($request['counsellor_sign']) ? $request['photo'] : '',
            // 'authority_sign'  => !empty($request['authority_sign']) ? $request['photo'] : '',
        ]);

        if ($request->preferred_syllabus == 'Pearson Edexcel') {
            $preferred_syllabus = 1;
        } else if ($request->preferred_syllabus == 'Cambridge Assessment International Education (CAIE)') {
            $preferred_syllabus = 2;
        } else if ($request->preferred_syllabus == 'School Curriculum') {
            $preferred_syllabus = 3;
        }

        $initial_id = 'A'.$newUser->location.date("y").$preferred_syllabus;

        $serial = Student::where('student_id', 'LIKE', $initial_id.'%')->max('student_id');
        if (!empty($serial)) {
            $newSerial = $initial_id.substr($serial, -3);
            $newUser->student_id = ++$newSerial;
        } else {
            $newUser->student_id = $initial_id.'001';
        }

        $newUser->save();

        return redirect()->route('students.index')->with('success', 'User Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $batches = Batch::where('status', 1)->get();
        $days = array(
            (object) [
                'tag' => 'sun',
                'name' => 'Sun'
            ],
            (object) [
                'tag' => 'mon',
                'name' => 'Mon'
            ],
            (object) [
                'tag' => 'tues',
                'name' => 'Tues'
            ],
            (object) [
                'tag' => 'wed',
                'name' => 'Wed'
            ],
            (object) [
                'tag' => 'thurs',
                'name' => 'Thurs'
            ],
            (object) [
                'tag' => 'fri',
                'name' => 'Fri'
            ],
            (object) [
                'tag' => 'sat',
                'name' => 'Sat'
            ]
        );
        $periods = [];
        $studentBatches = [];
        $takenBatches = DB::table('student_batch')->where('student', $id)->get();
        if (!empty($takenBatches)) {
            foreach ($takenBatches as $key => $takenBatch) {
                $studentBatch = Batch::where('id', $takenBatch->batch)->where('status', 1)->first();
                if(!empty($studentBatch)) {
                    array_push($studentBatches, $studentBatch);
                    if (!in_array($studentBatch->timestamp, $periods)) {
                        array_push($periods, $studentBatch->timestamp);
                    }
                }
            }
        }
        sort($periods);
        return view('pages.students.show', compact('student', 'batches', 'studentBatches', 'periods', 'days'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('pages.students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        $student->location = $request['location'];
        $student->name = $request['name'];
        $student->dob = $request['dob'];
        $student->gender = $request['gender'];
        $student->blood_group = $request['blood_group'];
        $student->phone = $request['phone'];
        $student->email = $request['email'];
        $student->address = $request['address'];
        $student->father_name = $request['father_name'];
        $student->father_no = $request['father_no'];
        $student->mother_name = $request['mother_name'];
        $student->mother_no = $request['mother_no'];
        $student->parent_office_address = $request['parent_office_address'];
        $student->parent = $request['parent'];
        $student->parent_phone = $request['parent_phone'];
        $student->subjects = json_encode($request['subjects']);
        $student->prev_institution = $request['prev_institution'];
        $student->current_grade = $request['current_grade'];
        $student->preferred_syllabus = $request['preferred_syllabus'];
        $student->enrolling_level = $request['enrolling_level'];
        $student->source = $request['source'];
        $student->photo = !empty($request['photo']) ? $request['photo'] : '';

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->status = 0;

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student disabled Successfully!');
    }

    /**
     * Add batch to student.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function addBatch(Request $request, $id)
    {

        $student = Student::find($id);
        $batch = $request['batch'];
        $existing = DB::table('student_batch')->where('student', $id)->where('batch', $request['batch'])->first();
        if (empty($existing)) {
            DB::table('student_batch')->insert([
                'student' => $id,
                'batch' => $request['batch']
            ]);
            return $this->show($id);
        } else {
            return $this->show($id);
        }
    }

    /**
     * Remove batch from student.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function removeBatch($id, $batch_id)
    {
        $student = Student::find($id);
        $existing = DB::table('student_batch')->where('student', $id)->where('batch', $batch_id)->delete();
        return $this->show($id);
    }

    public function toggle($id)
    {
        $student = Student::find($id);
        $student->status = $student->status == 0 ? 1 : 0;

        $student->save();

        return redirect()->route('students.show', $id)->with('success', 'Student status updated Successfully!');
    }

    /**
     * Student Details for pdf of the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function printDetails($id)
    {
        $student = Student::find($id);
        $batches = Batch::get();
        $studentBatches = [];
        $takenBatches = DB::table('student_batch')->where('student', $id)->get();
        if (!empty($takenBatches)) {
            foreach ($takenBatches as $key => $takenBatch) {
                $studentBatch = Batch::where('id', $takenBatch->batch)->where('status', 1)->first();
                if(!empty($studentBatch)) {
                    array_push($studentBatches, $studentBatch);
                }
            }
        }

        $pdf = PDF::loadView('pages.students.print_details', compact('student', 'batches', 'studentBatches'));
        return $pdf->download(''.$student->student_id.'_details.pdf');
    }

    /**
     * Student Routine for pdf of the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function printRoutine($id)
    {
        $student = Student::find($id);
        $batches = Batch::get();
        $days = array(
            (object) [
                'tag' => 'sun',
                'name' => 'Sun'
            ],
            (object) [
                'tag' => 'mon',
                'name' => 'Mon'
            ],
            (object) [
                'tag' => 'tues',
                'name' => 'Tues'
            ],
            (object) [
                'tag' => 'wed',
                'name' => 'Wed'
            ],
            (object) [
                'tag' => 'thurs',
                'name' => 'Thurs'
            ],
            (object) [
                'tag' => 'fri',
                'name' => 'Fri'
            ],
            (object) [
                'tag' => 'sat',
                'name' => 'Sat'
            ]
        );
        $periods = [];
        $studentBatches = [];
        $takenBatches = DB::table('student_batch')->where('student', $id)->get();
        if (!empty($takenBatches)) {
            foreach ($takenBatches as $key => $takenBatch) {
                $studentBatch = Batch::where('id', $takenBatch->batch)->where('status', 1)->first();
                if(!empty($studentBatch)) {
                    array_push($studentBatches, $studentBatch);
                    if (!in_array($studentBatch->timestamp, $periods)) {
                        array_push($periods, $studentBatch->timestamp);
                    }
                }
            }
        }
        sort($periods);

        // return view('pages.students.print_routine', compact('student', 'batches', 'studentBatches', 'periods', 'days'));

        $pdf = PDF::loadView('pages.students.print_routine', compact('student', 'batches', 'studentBatches', 'periods', 'days'));
        return $pdf->download(''.$student->student_id.'_routine.pdf');

    }

    /**
     * Print Student Card
     */
    public function printCard($id)
    {
        $student = Student::find($id);

        $pdf = PDF::loadView('pages.students.card', compact('student'));
        return $pdf->download(''.$student->student_id.'.pdf');

        // return view('pages.students.card', compact('student'));
    }
}
