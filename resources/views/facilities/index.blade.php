<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Installations
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a class="rounded bg-indigo-100 border border-indigo-400 px-2" href="{{ route('facilities.create') }}">Ajouter installation</a>
            <div class="space-y-2 mt-2">
                @foreach($facilities as $facility)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <a href="{{ route('facilities.edit', $facility->id) }}">
                            <div class="p-4 text-gray-900">
                                {{ $facility->name }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
