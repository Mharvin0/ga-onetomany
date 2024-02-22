<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function store(Request $request){
        return Subject::create($request->all());
        return redirect(route('subjects.index'));    

    }

    public function update(Request $request, $id){
        $subjects = Subject::find($id);
        $subjects -> update($request->all());
        return redirect(route('subjects.index'))->with('success', 'Updated!');
    }

    public function destroy($id){
        $subjects = Subject::find($id);
        $subjects -> delete();
        return redirect(route('subjects.index'))->with('success', 'Subject deleted!');
    }
} 
