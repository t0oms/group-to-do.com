<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Group;
use App\Models\User;
use App\Models\Invite;
use App\Models\Todo;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Group $group)
    {
        $members = $group->Members->reject(function ($user) {
            return $user->id === auth()->user()->id;
        });

        return view('to-do_new', compact('group', 'members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Group $group, Request $request)
    {  
        $to_do = new Todo();
        $to_do->name = $request->to_do_name;
        $to_do->description = $request->to_do_description;
        $to_do->for_id = $request->for_id;
        $to_do->by_id = auth()->user()->id;
        $to_do->group_id = $group->id;


        $to_do->save();
    
    
        return redirect()->route('showGroup', $group);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $todo = Todo::findOrFail($id);
        return view('todo_edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {        
        $todo = Todo::findOrFail($id);
        $todo->name = $request->to_do_name;
        $todo->description = $request->to_do_description;

        $todo->save();
    
    
        return redirect()->route('showGroup', $todo->group);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Todo::findOrfail($id)->delete();
        return back();
    }

    public function check(string $id)
    {        
        $todo = Todo::findOrFail($id);
        $todo->status = true;
        $todo->save();
    
        return redirect()->route('showGroup', $todo->group);
    }

    public function uncheck(string $id)
    {        
        $todo = Todo::findOrFail($id);
        $todo->status = false;
        $todo->save();
    
        return redirect()->route('indexDoneTodos', $todo->group);
    }
}
