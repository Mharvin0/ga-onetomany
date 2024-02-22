<?php

namespace App\Http\Controllers\Api;

use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return response()->json(['subjects' => $subjects]);
    }

    public function store(Request $request){
        return Subject::create($request->all());
    }

    public function update(Request $request, $id){
        $subjects = Subject::find($id);
        $subjects -> update($request->all());
        return response()->json(['subjects' => $subjects]);
    }

    public function destroy($id){
        $subjects = Subject::find($id);
        $subjects -> delete();
        return response()->json(['message' => "Deletion Succesful!"]);
    }
} 
