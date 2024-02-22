<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index(Request $request) {
        $student = Student::with('books', 'subjects')->get();
        return view('students.index', compact('student'));
    }
    public function create(){
        return view('students.create');
    }
    public function store(Request $request){
        $student=Student::create($request->all());

        if($request->has('books')){
            $student->books()->createMany($request->input('books'));
        }
        if($request->has('subjects')){
            $student->subjects()->createMany($request->input('subjects'));
        }
        return redirect(route('students.index'));    
    }
    public function edit($id){
        $student = Student::find($id);
        return view('students.edit')->with('student', $student);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        $student -> update($request->all());
        return redirect(route('students.index'))->with('success', 'Updated!');
    }

    public function destroy($id){
        $student = Student::find($id);
        $student->subjects()->delete();
        $student->books()->delete();
        $student->delete();
        return redirect(route('students.index'))->with('success', 'Student deleted!');
    }
}
