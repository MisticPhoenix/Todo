<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Http\Requests\UpdateRequest;
use App\Models\Todo;
use App\Models\User;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todo::all()->where('user_id', auth()->user()->id);
        return view('todo.index', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Todo::create($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Todo $todo)
    {
        $data = $request->validated();
        $todo->update($data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
    }
}
