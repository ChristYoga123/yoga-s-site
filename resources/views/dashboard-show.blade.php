<x-app-layout>
    <x-slot name="header">
        {{ __('Detail Messages') }}
    </x-slot>
    <div class="font-bold text-primary">
        <a href="{{ route('dashboard') }}"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        
        <div class="mb-10">
            <h1 class="text-2xl font-bold">Name</h1>
            <p class="text-lg">{{ $message->nama }}</p>
        </div>
        <div class="mb-10">
            <h1 class="text-2xl font-bold">Email</h1>
            <p class="text-lg">{{ $message->email }}</p>
        </div>
        <div class="mb-10">
            <h1 class="text-2xl font-bold">Message</h1>
            <p class="text-lg">{{ $message->message }}</p>
        </div>
        <div>
            <h1 class="text-2xl font-bold">Reply</h1>
            @if ($message->reply === null)
                <p class="text-lg">No Reply</p>
                <a href="{{ route('dashboard.edit', $message->id) }}"><button class="btn btn-xs btn-outline btn-warning">+ Give Reply</button></a>              
            @endif
            <p class="text-lg">{{ $message->reply }}</p>
        </div>

    </div>
</x-app-layout>
