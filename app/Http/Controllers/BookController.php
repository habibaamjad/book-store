<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getBook(){
        $books = Book::orderBy("id", "DESC")->with("user")->paginate(5);
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
            "image" => "required"
        ]);

        if($request->hasFile("image")){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $request["thumbnail"] =  $imageName;
        }


        $book = new Book;
        $book->user_id = auth()->user()->id;
        $book->title = $request->input('title');
        $book->description = $request->input("description");
        $book->price = $request->input("price");
        $book->author = $request->input("author");
        $book->thumbnail = $request->input("thumbnail");

        $book->save();



        return redirect()->route('home')->with("success", "Book has been created!");
    }


    public function deletebook($id){
        Book::find($id)->delete();
        return back()->with("error", "book has removed successfully!");
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
