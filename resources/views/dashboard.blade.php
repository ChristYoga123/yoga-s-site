<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($messages as $message)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                @if ($message->reply === null)
                                {{ $message->nama }}     <span class="badge badge-xs badge-warning"></span>
                                @else
                                {{ $message->nama }}
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <a href="{{ route('dashboard.show', $message->id) }}"><button class="btn btn-outline btn-primary"><i class="fa-solid fa-eye"></i></button></a>
                                <a href="{{ route('dashboard.edit', $message->id) }}"><button class="btn btn-outline btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <form action="{{ route('dashboard.destroy', $message->id) }}" method="post" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline btn-error" onclick="return confirm('Are you sure?')"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase bg-gray-50 border-t sm:grid-cols-9">
                {{ $messages->links() }}
            </div>
        </div>

    </div>
</x-app-layout>
