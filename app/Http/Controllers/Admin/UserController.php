<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userList = User::where('role_id', '=', '2')->select('id','name','email','created_at','role_id')->get();
        return view('admin.user.user-list',compact('userList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.create-user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $newUser = User::create([
            'name' => $request->name,
            'birth_date' => $request->birth_date,
            'sity' => $request->sity,
            'description' => $request->description,
            'email' => $request->email,
        ]);
        if ($newUser) {
            return redirect()->route('user.index');
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
        $oneUser = User::find($id);
        
        if ($oneUser === null) {
            abort(404);
        }else {
            return view('admin.user.show',compact('oneUser'));
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $oneUserEdit = User::find($id);
        
        if($oneUserEdit === null) {
            abort(404);
        }else {
            return view('admin.user.edit',compact('oneUserEdit'));
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
        $userUpdateFind = User::find($id);

        $userUpdateFind->update($request->all());
        return redirect()->route('user.index')->with('success','Обновленно');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDelete = User::find($id);
        $userDelete->delete();
        return redirect()->route('user.index')->with('success','Удалено');
    }
}
