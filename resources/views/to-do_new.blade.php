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
            <h5 class="text-xl font-medium text-gray-900">Create a To-Do</h5>
            <a type="button" href="{{ URL::route('indexMembers', $group); }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close</span>
            </a>
        </div>
        <form method="POST" action="{{ route('storeTo-Do', ['group' => $group]) }}">
            @csrf
            <div class="mb-5">
                <label for="to_do_name" class="block mb-2 text-sm font-medium text-gray-900">To-Do name</label>
                <input type="text" name="to_do_name" id="to_do_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mb-5">
                <label for="to_do_description" class="block mb-2 text-sm font-medium text-gray-900">To-Do Description</label>
                <textarea id="to_do_description" name="to_do_description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Description..."></textarea>
            </div>

            <p class="block mb-2 text-sm font-medium text-gray-900">Choose member</p>
            <div class="overflow-auto h-40 pr-8 pl-8 pt-2 border-2 sm:rounded-lg bg-white mb-8">
                <ul role="list" class="divide-y divide-gray-200">
                    @foreach ($members as $user)
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
                                <input type="radio" name="for_id" id="for_id" value="{{ $user->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create</button>
        </form>
    </div>
</body>

</html>
