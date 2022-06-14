<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BooksGenres;
use App\Models\User;
use App\Models\Genre;
use App\Models\Books;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booksList = Books::all();
        return view('admin.books.books-list',compact('booksList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userGenreList = [
            'users' => User::where('role_id', '=', '2')->select('id','name')->get(),
            'genres' => Genre::select('id','genres')->get(),
        ];
        return  view('admin.books.create',compact('userGenreList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $newBook = Books::create([
            'name_books'=> $request->name_books,
            'description' => $request->description,
            'year' => $request->year,
            'author_id' => $request->author_id,
            'genres_id' => $request->genres_id,
        ]);
        if ($newBook) {
            BooksGenres::created([
                'book_id' => $newBook->id,
                'author_id' => $request->author_id,
                'genres_id' => $request->genres_id,
            ]);
            return redirect()->route('books.index')->with('success','Добавлено');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
