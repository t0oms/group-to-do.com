<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Create group</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <form class="space-y-6" method="POST" action="{{ action([App\Http\Controllers\GroupController::class, 'store']) }}">
            <h5 class="text-xl font-medium text-gray-900">Create a new group</h5>
            @csrf
            <div>
                <label for="group_name" class="block mb-2 text-sm font-medium text-gray-900">Group name</label>
                <input type="text" name="group_name" id="group_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            
            <div>
            </div>
            <button type="submit" value="Add" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create</button>
        </form>
    </div>
</body>

</html>
