<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('user_id', auth()->user()->id)->paginate(15);
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "isbn" => "required",
            "title" => "required",
            'subtitle' => "required",
            'author' => "required",
            'published' => "required",
            'publisher' => "required",
            'pages' => "required",
            'description' => "required",
            'website' => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $book = new Book();
        $book->user_id = auth()->user()->id;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->subtitle = $request->subtitle;
        $book->author = $request->author;
        $book->published = $request->published;
        $book->publisher = $request->publisher;
        $book->pages = $request->pages;
        $book->description = $request->description;
        $book->website = $request->website;
        if ($book->save()) {
            return response()->json([
                "message" => "Book created",
                "book"      => $book
            ], 200);
        } else {
            return response()->json([
                "message" => "Inserting book failed",
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $book = Book::where('user_id', auth()->user()->id)->where("id", $id)->firstOrFail();
            return response()->json($book, 200); 
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return response()->json([
                'message' => "Book Not Found"
            ], 404); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            "isbn" => "required",
            "title" => "required",
            'subtitle' => "required",
            'author' => "required",
            'published' => "required",
            'publisher' => "required",
            'pages' => "required",
            'description' => "required",
            'website' => "required",
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $book = Book::where('user_id', auth()->user()->id)->where("id", $id)->firstOrFail();
        $book->user_id = auth()->user()->id;
        $book->isbn = $request->isbn;
        $book->title = $request->title;
        $book->subtitle = $request->subtitle;
        $book->author = $request->author;
        $book->published = $request->published;
        $book->publisher = $request->publisher;
        $book->pages = $request->pages;
        $book->description = $request->description;
        $book->website = $request->website;
        if ($book->save()) {
            return response()->json([
                "message" => "Book updated",
                "book"      => $book
            ], 200);
        } else {
            return response()->json([
                "message" => "Updating book failed",
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $book = Book::where('user_id', auth()->user()->id)->where("id", $id)->firstOrFail();
            return response()->json($book->delete(), 200);
            if ($book->delete()) {
                return response()->json([
                    'message' => "Book Deleted",
                    'book' => $book
                ], 200); 
            } else {
                return response()->json([
                    'message' => "Book Delete Failed"
                ], 500); 
            }
            
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $th) {
            return response()->json([
                'message' => "Book Not Found"
            ], 404); 
        }
    }

    public function search(Request $request) {
        $books = Book::where([
            ['title', '!=', Null],
            [function ($builder) use ($request) {
                if (($s = $request->search)) {
                    $builder->orWhere('title', 'LIKE', '%' . $s . '%')
                        ->orWhere('author', 'LIKE', '%' . $s . '%')
                        ->get();
                }
            }]
        ])->paginate(15);
        return response()->json($books, 200);
    }
}
