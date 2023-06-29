<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Group;
use App\Models\User;
use App\Models\Invite;
use App\Models\Todo;


class InviteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $invites = $user->receivedInvites;

        return view('invite_index', compact('invites'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Group $group, Request $request)
    {
        $searchQuery = $request->input('search_query');

        // Retrieve the top 20 users if no search query is provided
        if (empty($searchQuery)) {
            $users = User::where('id', '!=', auth()->user()->id) // Exclude the authenticated user
                ->orderBy('id', 'desc')
                ->take(20)
                ->get();
        } else {
            // Retrieve users based on the search query, excluding the authenticated user
            $users = User::where('id', '!=', auth()->user()->id) // Exclude the authenticated user
                ->where('name', 'like', '%' . $searchQuery . '%')
                ->get();
        }

        return view('group_invite_users', compact('group', 'users', 'searchQuery'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Group $group, Request $request)
    {

        $invite = new Invite();
        $invite->receiver_id = $request->receiver_id;
        $invite->sender_id = auth()->user()->id;
        $invite->group_id = $group->id;


        $invite->save();

        return redirect()->back();
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
    public function destroy(string $id)
    {
        Invite::findOrfail($id)->delete();
        return back();
    }

    public function inviteExists($groupId, $userId)
    {
        $exists = Invite::where('sender_id', auth()->user()->id)
                    ->where('receiver_id', $userId)
                    ->where('group_id', $groupId)
                    ->exists();

        return $exists;
    }
}
