<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Group;
use App\Models\User;
use App\Models\Invite;
use App\Models\Todo;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $groups = $user->groups;

        return view('dashboard', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('group_new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $rules = [
        //     'group_name' => 'required|min:|max:30',
        // ];

        // $validatedData = $request->validate($rules);

        $user = auth()->user();
        
        $group = new Group();
        $group->name = $request->group_name;
        $group->madeBy_id = $user->id;

        $group->save();
    

        $group->members()->attach($user);
    
        return redirect()->route('indexGroups');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {
        $todos = $group->todos()->where('status', false)->get();
        return view('group_show', compact('group', 'todos'));
    }

    public function indexDoneTodos(Group $group)
    {
        $todos = $group->todos()->where('status', true)->get();
        return view('group_doneTodos', compact('group', 'todos'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteScreen(Group $group)
    {
        return view('group_delete_sure', compact('group'));
    }

    public function destroy(string $groupId)
    {
        Group::findOrfail($groupId)->delete();
        return redirect()->route('indexGroups');
    }


}
