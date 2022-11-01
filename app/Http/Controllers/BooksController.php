<?php

namespace App\Http\Controllers;
use App\Models\book;
use Illuminate\Http\Request;
use Session;
class BooksController extends Controller
{
    public function showBooks(Request $request){
        $booksData = book::where('username',Session::get('username'))->get();
        $books = array();

        foreach ($booksData as $book){
            
            $arrayItem = [
                'id'=>$book->id,
                'title'=>$book->title,
                'author'=>$book->author,
                'editor'=>$book->editor,
                'no_of_pages'=>$book->no_of_pages
            ];

            
            array_push($books, $arrayItem);
        }

        
        return view('books',['books'=>$books,'name'=>Session::get('username'),'message'=>$request->message]);

    }
    public function addBook(Request $request){
        $ok = $request->validate(
            [
                'title'=>'required',
                'author'=>'required',
                'no_of_pages'=>'required',
                'editor'=>'required',
                ]);
       
        $books = book::create(
            [
                'title'=>$request->title,
                'author'=>$request->author,
                'no_of_pages'=>$request->no_of_pages,
                'editor'=>$request->editor,
                'username'=>Session::get('username')
                ]);
        return redirect('books');
    }

    public function updateBook($id=null,Request $request){
        $ok = $request->validate(
            [
                'title'=>'required',
                'author'=>'required',
                'no_of_pages'=>'required',
                'editor'=>'required',
                ]);
        if($id!=null){
        $books=book::where('id',$id)->first(); 
        $books['title']=$request->title;
        $books['author']=$request->author;
        $books['no_of_pages']=$request->no_of_pages;
        $books['editor']=$request->editor;     
        if($books->username==Session::get('username'))
        {
            $books->save();
            return redirect()->route('books',["message"=>"updated successfully"]);
        }
        }
        return redirect()->route('books',["message"=>"invalid request"]);
    }

    

    public function updateBookForm($id=null,Request $request){
        
        if($id!=null){
            $book=book::where('id',$id)->first();           
            $bookArr=[
                'title'=>$book->title,
                'author'=>$book->author,
                'no_of_pages'=>$book->no_of_pages,
                'editor'=>$book->editor,
                'id'=>$id
                ];
            if(Session::has('username'))
            {
                
                return view('updateBookForm',["book"=>$bookArr]);
            }
            }
        return redirect()->route('books',["message"=>"invalid request"]);
    
    }


    public function addBookForm(Request $request){
        return view('bookForm');
    }


    public function delete(Request $request,$id=null){
        if($id!=null){
            $book=book::where('id',$id)->first();
            if($book->username==Session::get('username'))
            {
                $book->delete();
                return redirect()->route('books',["message"=>"deleted successfully"]);
            }
        }
        return redirect()->route('books',["message"=>"invalid request"]);
    }


}
