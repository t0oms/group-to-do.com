<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Group;
use App\Models\User;
use App\Models\Invite;
use App\Models\Todo;


class Group_UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Group $group)
    {
        $members = $group->members->reject(function ($member) {
            return $member->id === auth()->user()->id;
        });

        return view('group_members', compact('members', 'group'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Invite $invite)
    {
        // $user = User::findOrFail($user_id);
        // $group = Group::findOrFail($group_id);

        $user = $invite->receiver;
        $group = $invite->group;

        $group->members()->attach($user);

        $inviteController = new InviteController();
        $inviteController->destroy($invite->id);

        return back();
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
    public function destroy(string $groupId, string $userId)
    {
        $group = Group::findOrFail($groupId);
        $user = User::findOrFail($userId);

        $group->members()->detach($user);

        return back();
    }
}
