<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Your invites</title>
</head>

<body class="bg-gray-200">
    
<nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
      <div class="flex items-center justify-between">
          <a href="{{ URL::route('indexGroups'); }}" class="flex ml-2 md:mr-24">
            <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">Group-To-Do</span>
          </a>
        

        <!-- Settings Dropdown -->
          <div class="hidden sm:flex sm:items-center sm:ml-6">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ml-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
        
      </div>
    </div>
  </nav>
  
  <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0" aria-label="Sidebar">
     <div class="h-full px-3 pb-4 overflow-y-auto bg-white">
        <ul class="space-y-2 font-medium">
           <li>
              <a href="{{ URL::route('indexGroups'); }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                 <span class="ml-3">Your Groups</span>
              </a>
           </li>
           <li>
              <a href="{{ URL::route('indexInvites'); }}" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-200">
                 <span class="flex-1 ml-3 whitespace-nowrap">Invites</span>
              </a>
           </li>
           {{-- <li>
              <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                 <span class="flex-1 ml-3 whitespace-nowrap">Your To-Dos</span>
              </a>
           </li>
            --}}
        </ul>
     </div>
  </aside>
  
  <div class="p-4 sm:ml-64">
     <div class="p-10 shadow-md overflow-y-auto h-[38rem] sm:rounded-lg mt-20 mr-8 ml-8 bg-white">
        <ul class=" mb-4">
            @forelse ($invites as $invite)
                <li class="p-2 flex justify-between shadow sm:rounded-lg mb-4 border-2 bg-white">
                    <div class="flex space-x-8 justify-between">
                        <div>
                            <p class="text-sm text-gray-500 truncate">group: </span>
                            <span class="text-sm font-medium text-gray-900 truncate">{{ $invite->group->name}}</h5>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 truncate">senty by: </span>
                            <span class="text-sm font-medium text-gray-900 truncate">{{ $invite->sender->name}}</h5>
                        </div>
                    </div>

                    <div class="flex">
                        <form method="POST" action="{{ route('storeMember', ['invite' => $invite]) }}">
                            @csrf
                            <input type="hidden" value="store">
                            <button type="submit" class="border-blue-900 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2">Accept</button>
                        </form> 
                        <form method="POST" action="{{ route('deleteInvite', ['invite' => $invite]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" value="delete" class="border-blue-900 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-1 text-center mr-2">Reject</button>
                        </form>
                    </div>
                </li>
            @empty
            <div class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap">You don't have any invites</div>
            @endforelse
        </ul>
     </div>
  </div>
  
</body>

</html>
