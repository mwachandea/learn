<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return the list of bookss
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books= Book::all();

        return $this->successResponse($books);
    }

    /**
     * Create one new book
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1',
            ];

        $this->validate($request, $rules);

        $book = Book::create($request->all());

        return $this->successResponse($book, Response::HTTP_CREATED);
    
    }

    /**
     * Show one book
     * @return Illuminate\Http\Response
     */
    public function show($book)
    {
        $book = Book::findOrFail($book);

        return $this->successResponse($book); 
    }

    /**
     * Update one book
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        $rules = [
            'title' => 'max:255',
            'description' => 'max:255',
            'price' => 'min:1',
            'author_id' => 'min:1',
            ];

        $this->validate($request, $rules);

        $book = Book::findOrFail($book);

        $book->fill($request->all());

        if ($book->isClean()){
            return $this->errorResponse('Must change at least One vlaue', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $book->save();

        return $this->successResponse($book);


    }

    /**
     * Delete one book
     * @return Illuminate\Http\Response
     */
    public function destory($book)
    {
        $book = Book::findOrFail($book);

        $book->delete();

        return $this->successResponse($book);
    }
}