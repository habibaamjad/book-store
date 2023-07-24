<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function getBook(){
        $books = Book::orderBy("id", "DESC")->get();
        return view("BooksList", compact("books"));
    }

    public function createBook(){
        return view("createBook");
    }

    public function editBook($id){
        $book = Book::find($id);
        return view("editBook", compact("book"));
    }

    public function storeBook(Request $request){

        $request->validate([
            "title" => "required",
            "description" => "required",
            "price" => "required",
            "author" => "required",
        ]);


        $book = new Book;
        $book->title = $request->input('title');
        $book->description = $request->input("description");
        $book->price = $request->input("price");
        $book->author = $request->input("author");

        $book->save();



        return back();
    }


    public function deletebook($id){
        Book::find($id)->delete();
        return back()->with("message", "book has removed successfully!");
    }

    public function updatebook(Request $request ,$id){

        $book = Book::find($id);
        $book->title = $request->input('title');
        $book->description = $request->input("description");
        $book->price = $request->input("price");
        $book->author = $request->input("author");

        $book->save();
        return redirect()->route("home")->with("message", "book has been updated successfully!");
    }
}
