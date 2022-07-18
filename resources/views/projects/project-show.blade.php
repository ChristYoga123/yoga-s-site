<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Project') }}
    </x-slot>
    <div class="font-bold text-primary">
        <a href="{{ route('projects.dashboard') }}"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div class="title my-5 text-center">
            <h1 class="text-4xl font-bold">{{ $project->name }}</h1>
        </div>

        <div class="hero-image flex justify-center">
            <img src="{{ asset('storage/'. $project->hero_image) }}" alt="" srcset="" class="w-[500px] max-w-full md:w-[500px] md:max-w-none">
        </div>

        <div class="content mt-5">
            <div class="text-gray-700">
                {!! $project->description !!}
            </div>
        </div>
        

    </div>
</x-app-layout>
