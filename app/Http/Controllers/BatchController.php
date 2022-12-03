<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use PDF;

class BatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::where('status', 1)->with('batchSubject', 'batchTeacher')->get();
        return view('pages.batches.index', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::get();
        $subjects = Subject::get();
        return view('pages.batches.create', compact('teachers', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newBatch = Batch::create([
            'subject' => $request['subject'],
            'teacher' => $request['teacher'],
            'title' => $request['title'],
            // 'status' => 1,
            'start_date' => $request['start_date'],
            'timestamp' => $request['timestamp'],
            'fee' => $request['fee'],
            'days'  => json_encode($request['days']),
            'classtime' => $request['classtime']
        ]);

        return redirect()->route('batches.index')->with('success', 'Batch Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $batch = Batch::where('id', $id)->with('batchSubject', 'batchTeacher')->first();
        $batchStudents = [];
        $regStudents = DB::table('student_batch')->where('batch', $id)->get();
        if (!empty($regStudents)) {
            foreach ($regStudents as $key => $regStudent) {
                $batchStudent = Student::find($regStudent->student);
                array_push($batchStudents, $batchStudent);
            }
        }
        return view('pages.batches.show', compact('batch', 'batchStudents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $batch = Batch::find($id);
        $subjects = Subject::get();
        $teachers = Teacher::get();
        return view('pages.batches.edit', compact('batch', 'teachers', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $batch = Batch::find($id);

        $batch->title = $request['title'];
        $batch->fee = $request['fee'];
        $batch->teacher = $request['teacher'];
        $batch->subject = $request['subject'];
        $batch->start_date = $request['start_date'];
        $batch->timestamp = $request['timestamp'];
        $batch->fee = $request['fee'];
        $batch->days  = json_encode($request['days']);
        $batch->classtime = $request['classtime'];

        $batch->save();

        return redirect()->route('batches.index')->with('success', 'Batch updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $batch = Batch::find($id);

        $batch->status = 0;

        $batch->save();

        // $batchStudents = DB::table('student_batch')->where('batch', $id)->delete();

        return redirect()->route('batches.index')->with('success', 'Batch Removed Successfully!');
    }

    /**
     * Student list of the batch.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function printStudentList($id)
    {
        $batch = Batch::where('id', $id)->with('batchSubject', 'batchTeacher')->first();
        $batchStudents = [];
        $regStudents = DB::table('student_batch')->where('batch', $id)->get();
        if (!empty($regStudents)) {
            foreach ($regStudents as $key => $regStudent) {
                $batchStudent = Student::find($regStudent->student);
                array_push($batchStudents, $batchStudent);
            }
        }

        $pdf = PDF::loadView('pages.batches.print_student_list', compact('batch', 'batchStudents'));
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 5000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        return $pdf->download('student_list.pdf');
    }
}
