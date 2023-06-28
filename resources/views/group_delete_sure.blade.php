<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Delete group</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <div class="space-y-6">
            <h5 class="text-xl font-medium text-gray-900">Are you sure?</h5>
            @csrf
            <p class="text-sm text-gray-500">Are you sure you want to delete group: 
            <span class="text-sm font-medium text-gray-900 truncate">{{ $group->name }}</span></p>
            
            <div>
            </div>
            <div class="flex justify-around">
                <a href="{{ URL::route('showGroup', $group); }}" class="w-28 text-gray-700 hover:text-white border border-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Cancel</a>

                <form method="POST" action="{{ route('deleteGroup', ['groupId' => $group->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" value="delete" class="w-28 text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 text-center">Delete</button>
                </form>
            </div> 
        </div>
    </div>
</body>

</html>
