<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genresList = Genre::select('id','genres', 'created_at')->paginate(5);
        return view('admin.genres.genres-list',compact('genresList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newGenre = Genre::create([
            'genres' => $request->genre,
        ]);
        if($newGenre) {
            return redirect()->route('genre.index');
        }else {
            return back()->withErrors(['error' => 'Ошибка сохранения']);
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
        $oneGenreEdit = Genre::find($id);
        if ($oneGenreEdit) {
            return view('admin.genres.edit', compact('oneGenreEdit'));
        }else {
            abort(404);
        }
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
        $genreUpdateFind = Genre::find($id);
        $genreUpdateFind->genres = $request->genre;
        $genreUpdateFind->update();

        return redirect()->route('genre.index')->with('success','Обновленно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDelete = Genre::find($id);
        $userDelete->delete();
        return redirect()->route('genre.index')->with('success','Удалено');
    }
}
