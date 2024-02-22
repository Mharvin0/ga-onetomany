<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request) {
        return Student::with('books', 'subjects')->get();
    }
    public function store(Request $request){
        $student=Student::create($request->all());

        if($request->has('books')){
            $student->books()->createMany($request->input('books'));
        }
        if($request->has('subjects')){
            $student->subjects()->createMany($request->input('subjects'));
        }
        return response()->json($student,201);
    }

    public function update(Request $request, $id){
        $student = Student::find($id);
        $student -> update($request->all());
        return response()->json($student,201);
    }

    public function destroy($id){
        $student = Student::find($id);
        $student->subjects()->delete();
        $student->books()->delete();
        $student->delete();
        return response()->json(['message'=> "Deletion succesful!"], 200);
    }
}

