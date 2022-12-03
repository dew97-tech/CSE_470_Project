<?php

namespace App\Http\Controllers;

use App\Models\Potential;
use Illuminate\Http\Request;

class PotentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $potentials = Potential::get();
        return view('pages.potentials.index', compact('potentials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.potentials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = Potential::create([
            'name' => $request['name'],
            'source' => $request['source'],
            'phone'  => $request['phone'],
            'parent_phone'  => $request['parent_phone'],
            'address'  => $request['address'],
            'subjects'  => json_encode($request['subjects']),
            'prev_institution'  => $request['prev_institution'],
            'current_grade'  => $request['current_grade'],
            'exam_batch_session'  => $request['exam_batch_session'],
            'enrolling_level'  => $request['enrolling_level']
        ]);

        return redirect()->route('potentials.index')->with('success', 'Potential Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Potential  $potential
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $potential = Potential::find($id);
        return view('pages.potentials.show', compact('potential'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Potential  $potential
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $potential = Potential::find($id);
        return view('pages.potentials.edit', compact('potential'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Potential  $potential
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $potential = Potential::find($id);
        
        $potential->name = $request['name'];
        $potential->source = $request['source'];
        $potential->phone = $request['phone'];
        $potential->parent_phone = $request['parent_phone'];
        $potential->address = $request['address'];
        $potential->subjects = json_encode($request['subjects']);
        $potential->prev_institution = $request['prev_institution'];
        $potential->current_grade = $request['current_grade'];
        $potential->exam_batch_session = $request['exam_batch_session'];
        $potential->enrolling_level = $request['enrolling_level'];

        $potential->save();

        return redirect()->route('potentials.index')->with('success', 'Potential Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Potential  $potential
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $potential = Potential::find($id);
        $potential->delete();

        return redirect()->route('potentials.index')->with('success', 'Potential Removed Successfully!');
    }

    public function convert($id)
    {
        $potential = Potential::find($id);
        return view('pages.students.create', compact('potential'));
    }
}
