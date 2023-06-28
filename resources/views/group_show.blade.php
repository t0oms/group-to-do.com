<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $group->name }}</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-200">
    <div class="w-full h-[38rem] max-w-5xl p-4 bg-white border border-gray-200 rounded-lg shadow-md sm:p-6 md:p-8">
        
        {{--  --}}
        <div class="flex">
            <div class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">{{ $group->name }}</div>
            <a type="button" href="{{ URL::route('indexGroups'); }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close</span>
            </a>
        </div>
        <div class="flex h-full pb-8 pt-8">
          <aside class="flex-none transition-transform -translate-x-full bg-white sm:translate-x-0" aria-label="Sidebar">
             <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium">
                   <li>
                      <a href="{{ URL::route('showGroup', $group); }}" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-200">
                         <span class="ml-3">To-Dos</span>
                      </a>
                   </li>
                   <li>
                      <a href="{{ URL::route('indexMembers', $group); }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                         <span class="flex-1 ml-3 whitespace-nowrap">Group Members</span>
                      </a>
                   </li>
                   <li>
                      <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                         <span class="flex-1 ml-3 whitespace-nowrap">Done To-Dos</span>
                      </a>
                   </li>
                   
                </ul>
             </div>
          </aside>
          
          <div class="flex-auto h-full p-4 shadow-inner sm:rounded-lg bg-gray-200">
                
          </div>
        </div>
        {{--  --}}
    </div>
</body>

</html>
