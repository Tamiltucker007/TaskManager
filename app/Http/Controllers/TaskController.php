<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index',compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'date',
            'completed_at' => 'date',
        ]);

        // Create a new task with the validated data
        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully');

    }

    public function edit($id)
    {
        $task = Task::findorFail($id);

        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findorFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'due_date' => 'date',
            'completed_at' => 'date',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');
    }
}
