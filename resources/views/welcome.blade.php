<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Group-to-do</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        
    </head>
    <body class="">
        <div class="fi fixed top-0 z-50 w-full sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-200 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="mt-6 flex w-full items-center justify-center min-h-screen bg-gray-200 pl-8">
                <div class=" p-6  shadow-2xl flex flex-col w-full h-[38rem] max-w-5xl bg-white border border-gray-200 rounded-lg pr-8 pt-8 pb-4 ">
                    <div>
                        <div class=" font-semibold self-center text-4xl m-10 whitespace-nowrap">Group-To-Do</div>
                        <div class="px-8">
                            <p class="mb-8">Our app is designed to help you stay organized and collaborate effectively with your groups and team members. Whether you're managing a project, organizing an event, or simply trying to keep track of your personal tasks, our app provides the tools and features you need to streamline your workflow and achieve your goals.
                            </p>
                            <p class="mb-8">With our app, you can create and join groups, allowing you to bring together like-minded individuals and work towards a common objective. Within each group, you can invite members, assign tasks, and share important documents and information. This makes it easy to delegate responsibilities, foster collaboration, and ensure everyone is on the same page.
                            </p>
                            <p>We're excited to have you on board and look forward to helping you boost productivity, enhance collaboration, and achieve success with our app. So go ahead, create your first group, invite your team members, and start organizing and conquering your tasks together!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
