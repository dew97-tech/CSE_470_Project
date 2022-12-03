<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::get();
        return view('pages.teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subjects = Subject::get();
        // dd($subjects);
        return view('pages.teachers.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newUser = Teacher::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone'  => $request['phone'],
            // 'subject'  => $request['subject'],
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        $subjects = Subject::get();
        return view('pages.teachers.edit', compact('teacher', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        $teacher->name = $request['name'];
        $teacher->email = $request['email'];
        $teacher->phone = $request['phone'];
        // $teacher->subject = $request['subject'];

        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Teacher::find($id);
        $user->delete();

        return redirect()->route('teachers.index')->with('success', 'User Removed Successfully!');
    }
}
