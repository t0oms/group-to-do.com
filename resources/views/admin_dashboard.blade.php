<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Groups') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mt-4">
                        <ul>
                            @foreach ($groups as $group)
                                <li>
                                    <a href="{{ route('groups.show', ['group' => $group->id]) }}">{{ $group->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                        <a href="{{ route('groups.create') }}">Add new group</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
