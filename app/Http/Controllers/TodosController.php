<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\CreateTodoRequest;

class TodosController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        return Todo::where(['user_id'=>auth()->user()->id])->get();
    }

    public function store(CreateTodoRequest $request)
    {
        return Todo::create(array_merge($request->all(), ['user_id'=>auth()->user()->id]));
    }

    public function show($id)
    {
        return Todo::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::findOrFail($id);
        return $todo->update($request->all());
    }
    
    public function destroy($id)
    {
        return Todo::destroy($id);
    }
}