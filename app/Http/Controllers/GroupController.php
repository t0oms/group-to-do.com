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
        return view('group_show', compact('group'));
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

    // public function inviteUsers(string $id, Request $request)
    // {
    //     $group = Group::findOrFail($id);
    //     $searchQuery = $request->input('search_query');

    //     // Retrieve the top 20 users if no search query is provided
    //     if (empty($searchQuery)) {
    //         $users = User::where('id', '!=', auth()->user()->id) // Exclude the authenticated user
    //             ->orderBy('id', 'desc')
    //             ->take(20)
    //             ->get();
    //     } else {
    //         // Retrieve users based on the search query, excluding the authenticated user
    //         $users = User::where('id', '!=', auth()->user()->id) // Exclude the authenticated user
    //             ->where('name', 'like', '%' . $searchQuery . '%')
    //             ->get();
    //     }

    //     return view('group_invite_users', compact('group', 'users', 'searchQuery'));
    // }


    // public function storeUser(Group $group, User $user)
    // {
    //     $group->members()->attach($user);
    //     return back();
    // }
    // public function showMembers(string $id)
    // {
    //     $group = Group::findOrFail($id);
    //     $members = $group->members->reject(function ($member) {
    //         return $member->id === auth()->user()->id;
    //     });

        

    //     return view('group_members', compact('members', 'group'));

    // }
}
