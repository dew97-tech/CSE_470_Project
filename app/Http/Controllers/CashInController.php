<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\CashIn;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class CashInController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashIns = CashIn::with('cashinStudent')->orderBy('created_at', 'DESC')->get();
        return view('pages.cashins.index', compact('cashIns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($student_id)
    {
        // $students = Student::get();
        $student = Student::find($student_id);
        $studentBatches = [];
        $takenBatches = DB::table('student_batch')->where('student', $student_id)->get();
        if (!empty($takenBatches)) {
            foreach ($takenBatches as $key => $takenBatch) {
                $studentBatch = Batch::where('id', $takenBatch->batch)->where('status', 1)->first();
                if(!empty($studentBatch)) {
                    array_push($studentBatches, $studentBatch);
                }
            }
        }
        return view('pages.cashins.create', compact('student', 'studentBatches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $year = date("y");
        $serial = CashIn::where('receipt_no', 'LIKE', 'CIR%')->max('receipt_no');
        $newSerial = '';
        if (!empty($serial)) {
            $newSerial = ++$serial;
        } else {
            $newSerial = 'CIR-'.($year).'-0001';
        }

        // create cashin record
        $newCashIn = CashIn::create([
            'student' => $request['student'],
            'month' => $request['month'],
            'paid_batches' => json_encode($request['paid_batches']),
            'mobile' => $request['mobile'],
            'collected_by' => $request['collected_by'],
            'total_fee' => $request['total_amount'],
            'receipt_no' => $newSerial
        ]);

        $newCashIn->save();

        // create seperate batch fee records
        foreach ($request['paid_batches'] as $key => $paid_batch) {
            DB::table('batch_fee')->insert([
                'student_id' => $request['student'],
                'batch_id' => $paid_batch['batch_id'],
                'fee' => $paid_batch['batch_fee'],
                'month' => $request['month'].date("Y"),
                'receipt_no' => $newSerial
            ]);
        }

        return redirect()->route('students.show', $request['student'])->with('success', 'Cash Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CashIn  $cashIn
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cashin = CashIn::find($id);
        $student = Student::find($cashin->student);
        return view('pages.cashins.show', compact('cashin', 'student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CashIn  $cashIn
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cashin = CashIn::find($id);
        $student = Student::find($cashin->student);
        return view('pages.cashins.edit', compact('cashin', 'student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CashIn  $cashIn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashIn $cashIn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CashIn  $cashIn
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashIn $cashIn)
    {
        //
    }

    /**
     * Print Receipt
     *
     */
    public function printReceipt($id)
    {
        $cashin = CashIn::find($id);
        $student = Student::find($cashin->student);
       
        // return view('pages.cashins.print_receipt', compact('cashin', 'student'));

        $pdf = PDF::loadView('pages.cashins.print_receipt', compact('student', 'cashin'));
        return $pdf->download(''.$cashin->receipt_no.'.pdf');
    }
}
