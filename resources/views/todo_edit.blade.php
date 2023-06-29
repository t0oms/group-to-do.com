<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Edit To-Do</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-full h-[30rem] max-w-lg p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8">
        <div class="flex-none flex mb-6">
            <h5 class="text-xl font-medium text-gray-900">Edit a To-Do</h5>
            <a type="button" href="{{ URL::route('showGroup', $todo->group); }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close</span>
            </a>
        </div>
        <form method="POST" action="{{ route('updateTo-Do', ['todo' => $todo]) }}">
            @csrf
            <div class="mb-5">
                <label for="to_do_name" class="block mb-2 text-sm font-medium text-gray-900">To-Do name</label>
                <input type="text" name="to_do_name" id="to_do_name" value="{{ $todo->name }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
            </div>
            <div class="mb-5">
                <label for="to_do_description" class="block mb-2 text-sm font-medium text-gray-900">To-Do Description</label>
                <textarea id="to_do_description" name="to_do_description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Description...">{{ $todo->description }}</textarea>
            </div>

            
            <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Edit</button>
        </form>
    </div>
</body>

</html>
