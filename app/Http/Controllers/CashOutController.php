<?php

namespace App\Http\Controllers;

use App\Models\CashOut;
use Illuminate\Http\Request;
use PDF;

class CashOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashOuts = CashOut::orderBy('created_at', 'DESC')->get();
        return view('pages.cashouts.index', compact('cashOuts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cashOut = CashOut::get();
        return view('pages.cashouts.create', compact('cashOut'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Auto-Genareted Receipt 
        $year = date("y");
        $serial = CashOut::where('receipt_no', 'LIKE', 'COR%')->max('receipt_no');
        $newSerial = '';
        if (!empty($serial)) {
            $newSerial = ++$serial;
        } else {
            $newSerial = 'COR-'.($year).'-0001';
        }
        // dd($newSerial);
        //Create New Cashout
        $newCashOut = CashOut::create([
            'receipt_no' => $newSerial,
            'name_of_payee'=> $request['nameofpayee'],
            'purpose'=> $request['purpose'],
            'description'=> $request['description'],
            'amount'=> $request['amount'],
        ]);

        return redirect()->route('cashouts.index')->with('success', 'Cashout Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CashOut  $cashOut
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $cashOut = CashOut::find($id);
        return view('pages.cashouts.show', compact('cashOut'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CashOut  $cashOut
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cashOut = CashOut::find($id);
        return view('pages.cashouts.edit', compact('cashOut'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CashOut  $cashOut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $cashOut = CashOut::find($id);

        $cashOut->name_of_payee = $request['nameofpayee'];
        $cashOut->purpose = $request['purpose'];
        $cashOut->description = $request['description'];
        $cashOut->amount = $request['amount'];
        

        $cashOut->save();

        return redirect()->route('cashouts.index')->with('success', 'Cashouts updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CashOut  $cashOut
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cashOut = CashOut::find($id); 
        $cashOut->delete();
        

        return redirect()->route('cashouts.index')->with('success', 'Cashout Removed Successfully!');
    }

    public function printReceipt($id)
    {
        $cashout = CashOut::find($id);

        // return view('pages.cashouts.print_receipt', compact('cashout'));

        $pdf = PDF::loadView('pages.cashouts.print_receipt', compact('cashout'));
        return $pdf->download(''.$cashout->receipt_no.'.pdf');
    }
}
