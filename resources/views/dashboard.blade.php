<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Your groups</title>
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
              <a href="{{ URL::route('indexGroups'); }}" class="flex items-center p-2 text-gray-900 rounded-lg bg-gray-200">
                 <span class="ml-3">Your Groups</span>
              </a>
           </li>
           <li>
              <a href="{{ URL::route('indexInvites'); }}" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                 <span class="flex-1 ml-3 whitespace-nowrap">Invites</span>
              </a>
           </li>
           {{-- <li>
              <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200">
                 <span class="flex-1 ml-3 whitespace-nowrap">Your To-Dos</span>
              </a>
           </li> --}}
           
        </ul>
     </div>
  </aside>
  
  <div class="p-4 sm:ml-64">
     <div class="p-8 shadow-md sm:rounded-lg mt-20 mr-8 ml-8 bg-white">
        <ul class="grid grid-cols-3 gap-8 mb-4">
            @foreach ($groups as $group)
                <li>
                    <?php if($group->MadeBy->id === auth()->user()->id): ?>
                        <a href="{{ route('showGroup', ['group' => $group->id]) }}" class="h-40 block max-w-sm p-6 bg-white border-2 border-green-500 rounded-md shadow-lg hover:bg-gray-200">
                    <?php else: ?>
                        <a href="{{ route('showGroup', ['group' => $group->id]) }}" class="h-40 block max-w-sm p-6 bg-white border-2 border-gray-200 rounded-md shadow-lg hover:bg-gray-200">
                    <?php endif; ?>
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $group->name }}</h5>
                        <p class="text-sm text-gray-500 truncate">made by: 
                        <?php if($group->MadeBy->id === auth()->user()->id): ?>
                            <span class="text-sm font-medium text-gray-900 truncate">You</span></p>
                        <?php else: ?>
                            <span class="text-sm font-medium text-gray-900 truncate">{{ $group->MadeBy->name }}</span></p>
                        <?php endif; ?>
                    </a>
                </li>
            @endforeach
            <li>
                <a href="{{ route('createGroup') }}" class="h-40 hover:border-blue-500 hover:border-solid hover:bg-white hover:text-blue-500 group max-w-sm flex flex-col items-center justify-center rounded-md border-2 border-dashed border-slate-300 text-sm leading-6 text-slate-900 font-medium py-3">
                    <svg class="group-hover:text-blue-500 mb-1 text-slate-400" width="20" height="20" fill="currentColor" aria-hidden="true">
                      <path d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1Z" />
                    </svg>
                    New Group
                </a>
            </li>
        </ul>
     </div>
  </div>
  
</body>

</html>
