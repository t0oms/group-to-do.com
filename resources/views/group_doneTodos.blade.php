<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ $group->name }}</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-200 pl-8">
    <div class="flex flex-col w-full h-[38rem] max-w-5xl bg-white border border-gray-200 rounded-lg shadow-md pr-8 pt-8 pb-4">
        <div class="flex-none flex pl-8">
            <div class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">{{ $group->name }}</div>
            <a type="button" href="{{ URL::route('indexGroups'); }}" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="defaultModal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Close</span>
            </a>
        </div>
        <div class="grow h-[30rem] flex pb-4 pt-8">
          <aside class="flex-none transition-transform -translate-x-full bg-white sm:translate-x-0" aria-label="Sidebar">
             <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
                <ul class="space-y-2 font-medium">
                   <li>
                      <a href="{{ URL::route('showGroup', $group); }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                         <span class="text-center">To-Dos</span>
                      </a>
                   </li>
                   <li>
                      <a href="{{ URL::route('indexMembers', $group); }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                         <span>Group Members</span>
                      </a>
                   </li>
                   <li>
                      <a href="{{ URL::route('indexDoneTodos', $group); }}" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-200">
                         <span>Done To-Dos</span>
                      </a>
                   </li>
                   
                </ul>
             </div>
          </aside>
          
          <div class="flex-auto flex flex-col-reverse overflow-auto h-full p-10 border-2 shadow-inner sm:rounded-lg bg-gray-200">
            @forelse ($todos as $todo)
            <?php if($todo->createdBy->id === auth()->user()->id): ?>
               <div class="max-w-3xl shadow-md sm:rounded-lg bg-white mb-4 border-2 border-green-500">
            <?php elseif($todo->forUser->id === auth()->user()->id): ?>
               <div class="max-w-3xl shadow-md sm:rounded-lg bg-white mb-4 border-2 border-red-500">
            <?php else: ?>
               <div class="max-w-3xl shadow-md sm:rounded-lg bg-white mb-4">
            <?php endif; ?>
                  <table class=" text-sm text-left text-gray-500">
                     <tbody>
                        <tr class="">
                           <div>
                           <th scope="row" class="px-3 py-4 font-medium text-gray-900 w-3/12">
                              <p class="line-clamp-2">
                                 {{ $todo->name }}
                              </p>
                           </th>
                           <td class="px-3 py-4 w-5/12">
                              <p class="line-clamp-3">
                                 {{ $todo->description }}
                              </p>
                              </td>
                           <td class="px-3 py-4 w-2/12">
                                 <div class="flex-1 min-w-0">
                                 <p class="self-end text-sm text-gray-500 mb-4 ">made by: <span class=" whitespace: nowrap text-sm font-medium text-gray-900 self-end">{{ $todo->createdBy->name }}</span></p>
                                 <p class="self-end text-sm text-gray-500 text-left">for: <span class=" whitespace: nowrap text-sm font-medium text-gray-900 self-end">{{ $todo->forUser->name }}</span></p>
                           </div>
                           </td>
                           
                           <td class="px-3 py-4 w-1/12">
                                 <div>
                                    <a href="#" class="text-green-700 hover:text-white hover:bg-green-800 focus:ring-2 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-1 text-center">Open</a>
                                    <?php if($todo->createdBy->id === auth()->user()->id || $group->MadeBy->id === auth()->user()->id): ?>
                                       <a href="{{ route('editTo-Do', $todo) }}" class="text-blue-700 hover:text-white hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-1 text-center">Edit</a>
                                       {{-- <a href="#" class="text-red-700 hover:text-white hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-1 text-center">Delete</a> --}}

                                       <form method="POST" action="{{ route('deleteTo-Do', ['todo' => $todo]) }}">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" value="delete" class="text-red-700 hover:text-white hover:bg-red-800 focus:ring-2 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-1 text-center">Delete</button>
                                      </form>
                                    <?php endif; ?>
                                 </div>
                           </td>
                           <td class="w-1/12 p-4">
                              <?php if($todo->forUser->id === auth()->user()->id): ?>
                                 
                              <form method="POST" action="{{ route('uncheckTo-Do', ['todo' => $todo]) }}">
                                 <button type="submit"  class="text-white border-2  focus:ring-blue-500 border-gray-500 bg-blue-800 hover:bg-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center mr-2"></button>
                                 @csrf
                              </form>

                              <?php endif; ?>
                           </td>
                        </tr>
                     </tbody>
                  </table>
               </div>
            @empty
            @endforelse
          </div>
        </div>
        
            <div class="flex-none flex justify-between pl-8">
               <?php if($group->MadeBy->id === auth()->user()->id): ?>
                  <a href="{{ route('deleteScreen', $group) }}"" class="  text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-2 py-1 text-center">
                     <span class="flex-1 whitespace-nowrap">Delete Group</span>
                  </a>
                <?php else: ?>
                  <div></div>
                <?php endif; ?>
               
                <?php if($group->Members->count() !== 1): ?>
                  <a href="{{ route('createTo-Do', $group) }}" class=" text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">
                     <span class="flex-1 whitespace-nowrap">Create To-Do</span>
                  </a>
                <?php else: ?>
                  <div></div>
                <?php endif; ?>
            </div>
    </div>
</body>

</html>
