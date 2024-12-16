<?php

namespace App\Http\Controllers;

use App\Models\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
            $status = $request->get('status','all');

            $todo= todo::when($status !== 'all',function($query) use ($status){
                return $query->where('status', $status);
            })->get();

        $todo =todo::paginate(10);
        return view('todo.index', compact('todo','status'));

      
    }
    public function test_todo_creation()
{
    $response = $this->postJson('/api/todos', [
        'title' => 'Test Todo',
        'details' => 'Details of the todo',
        'status' => 'not started',
    ]);

    $response->assertStatus(201)
             ->assertJsonStructure(['id', 'title', 'details', 'status']);
}

    public function search(Request $request){

      $query = $request->input('query');
      $todo = todo::where('title','LIKE', '%'.$query.'%')
      ->orWhere('details','LIKE','%'.$query.'%')
      ->get();
      return view('todo.search', compact('todo','query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'required',
            'details'=>'required',
            'status'=>'required|in:in-progress,not-started,completed'
        ]);
        todo::create([
            'title'=>$request->title,
            'details'=>$request->details,
            'status'=>$request->status
        ]);

        return redirect('todo')->with('status','Activity created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(todo $todo)
    {
        //
        return view('todo.show',compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(todo $todo, Request $request)
    {
        //
        $status = $request->get('status','all');
        return view('todo.edit',compact('todo','status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, todo $todo)
    {
        //
        $request->validate([
            'title'=>'required',
            'details'=>'required',
            'status'=>'required|in:not-started,in-progress,completed'
        ]);
        $todo->update([
            'title'=>$request->title,
            'details'=>$request->details,
            'status'=>$request->status
        ]);
        return redirect('todo')->with('status','Changes made successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(todo $todo)
    {
        //
        $todo->delete();
        return redirect('todo')->with('status','Changes made successfully');
    }
}
