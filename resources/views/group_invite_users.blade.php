<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Add users</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full h-[38rem] max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <div class="flex-none flex mb-6">
            <h5 class="text-xl font-medium text-gray-900">Add users</h5>
            <a type="button" href="{{ URL::route('indexMembers', $group); }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close</span>
            </a>
        </div>
        <form method="GET" action="{{ route('createInvite', $group) }}" class="mb-3">   
            <label for="search_query" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search Users:</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" name="search_query" id="search_query" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Search Users...">
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
        </form>
        <div class="overflow-auto h-4/5 pr-8 pl-8 pt-5 border-2 sm:rounded-lg bg-white">
            <ul role="list" class="divide-y divide-gray-200">
                @forelse ($users as $user)
                    <li class="py-3 sm:py-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">
                                    {{ $user->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate">
                                    {{ $user->email }}
                                </p>
                            </div>
                            @if (app('App\Http\Controllers\UserController')->isMember($group->id, $user->id))
                                <p class="text-sm text-gray-500 truncate">
                                    member
                                </p>
                            @elseif (app('App\Http\Controllers\InviteController')->inviteExists($group->id, $user->id))
                                <p class="text-sm text-gray-500 truncate">
                                    invited
                                </p>
                            @else 
                                <form method="POST" action="{{ route('storeInvite', ['group' => $group]) }}">
                                    @csrf
                                    <input type="hidden" name="receiver_id" value="{{ $user->id }}">
                                    <button type="submit" class="border-blue-900 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2 mb-2">Invite</button>
                                </form>          
                            @endif
                        </div>
                    </li>
                @empty
                <p class="pt-5 text-sm font-medium text-gray-900 truncate">
                    No users with that name
                </p>
                @endforelse
            </ul>
        </div>
    </div>
</body>

</html>
