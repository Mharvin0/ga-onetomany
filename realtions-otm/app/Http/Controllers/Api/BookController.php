<?php

namespace App\Http\Controllers\Api;

use App\Models\Books;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Books::all();
        return response()->json(['books' => $books]);
    }
    public function create(){
    }

    public function store(Request $request){
        return Books::create($request->all());
    }

    public function update(Request $request, $id){
        $books = Books::find($id);
        $books -> update($request->all());
        return response()->json(['books' => $books]);
    }

    public function destroy($id){
        $books = Books::find($id);
        $books -> delete();
        return response()->json(['message' => "Deletion Succesful!"]);
    }
}
