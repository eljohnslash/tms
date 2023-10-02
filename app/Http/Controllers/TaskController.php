<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        //Only accessible for guests
        $this->middleware('auth');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
		return view('tasks.index',['tasks' => Task::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [

            'title' => 'required',
			'description' => 'required',

        ]);

		$task = new Task;
		
		$task->user_id = auth()->user()->id;
		$task->title = sanitize_string(request('title'));
		$task->description = sanitize_string(request('description'));
		$task->status = sanitize_string(request('status'));
		$task->save();

		return response()->json(1);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $this->validate(request(), [

            'id' => 'required',
			'title' => 'required',
			'description' => 'required',

        ]);


            $task = Task::find(sanitize_string(request('id')));
            $task->user_id = auth()->user()->id;
			$task->title = sanitize_string(request('title'));
			$task->description = sanitize_string(request('description'));
			$task->status = sanitize_string(request('status'));
            $task->save();
            return response()->json(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate(request(), [

            'id'    => 'required',

        ]);

        $id = sanitize_int(request('id'));

        $exam = Task::find($id);

        if ($exam) {
            $exam->delete();
            return $exam ? 1 : response('Something went wrong. Please reload the page.');
        } else {
            return response('Task not existing.');
        }
    }
}
