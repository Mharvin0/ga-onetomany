<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Books::all();
        return view('books.index', compact('books'));
    }
    public function create(){
        return view('books.create');
    }

    public function store(Request $request){
        return Books::create($request->all());
        return redirect(route('books.index'));    

    }
    public function edit($id){
        $books = Books::find($id);
        return view('books.edit')->with('books', $books);
    }

    public function update(Request $request, $id){
        $books = Books::find($id);
        $books -> update($request->all());
        return redirect(route('books.index'))->with('success', 'Updated!');
    }

    public function destroy($id){
        $books = Books::find($id);
        $books -> delete();
        return redirect(route('books.index'))->with('success', 'Book deleted!');
    }
}
