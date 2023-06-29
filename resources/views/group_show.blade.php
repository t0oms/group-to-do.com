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
                      <a href="{{ URL::route('showGroup', $group); }}" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-200">
                         <span class="text-center">To-Dos</span>
                      </a>
                   </li>
                   <li>
                      <a href="{{ URL::route('indexMembers', $group); }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                         <span>Group Members</span>
                      </a>
                   </li>
                   <li>
                      <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                         <span>Done To-Dos</span>
                      </a>
                   </li>
                   
                </ul>
             </div>
          </aside>
          
          <div class="flex-auto flex flex-col-reverse overflow-auto h-full p-10 border-2 shadow-inner sm:rounded-lg bg-gray-200">
            <div class="max-w-3xl shadow-md sm:rounded-lg bg-white">
               <table class=" text-sm text-left text-gray-500">
                  <tbody>
                     <tr class="">
                        <div>
                        <th scope="row" class="px-3 py-4 font-medium text-gray-900 w-3/12">
                           <p class="line-clamp-2">
                              Apple MacBook Pro 17" On the other hand, we On the other hand, we
                           </p>
                        </th>
                        <td class="px-3 py-4 w-5/12">
                           <p class="line-clamp-3">
                              On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire
                           </p>
                           </td>
                        <td class="px-3 py-4 w-2/12">
                              <div class="flex-1 min-w-0">
                              <p class="self-end text-sm text-gray-500">made by: <span class=" whitespace: nowrap text-sm font-medium text-gray-900 self-end">user</span></p>
                              <p class="self-end text-sm text-gray-500 ">for: <span class=" whitespace: nowrap text-sm font-medium text-gray-900 self-end">Toms</span></p>
                        </div>
                        </td>
                        
                        <td class="px-3 py-4 w-1/12">
                              <a href="#" class="font-medium text-blue-60 hover:underline">Edit</a>
                        </td>
                        <td class="w-1/12 p-4">
                              <div class="flex items-center">
                                 <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
                                 <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                              </div>
                        </td>
                     </tr>
                  </tbody>
            </table>
         </div>

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
                  <a href="{{ route('createTo-Do', $group) }}"" class=" text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center">
                     <span class="flex-1 whitespace-nowrap">Create To-Do</span>
                  </a>
                <?php else: ?>
                  <div></div>
                <?php endif; ?>
            </div>
    </div>
</body>

</html>
