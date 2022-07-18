<x-app-layout>
    <x-slot name="header">
        {{ __('Projects') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <a href="{{ route('projects.create') }}"><button class="btn btn-outline btn-primary mb-4">+ Create Project</button></a>
        <div class="overflow-hidden mb-8 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Image</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($projects as $project)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">
                                {{ $project->name }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{ $project->status }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <div class="img w-[50px] md:w-[200px]">
                                    <img src="{{ asset('storage/'. $project->hero_image) }}" alt="" srcset="" class="">

                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm flex-row">
                                <a href="{{ route('projects.show', $project->slug) }}"><button class="btn btn-outline btn-primary"><i class="fa-solid fa-eye"></i></button></a>
                                <a href="{{ route('projects.edit', $project->slug) }}"><button class="btn btn-outline btn-warning"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                <form action="{{ route('projects.destroy', $project->slug) }}" method="post" class="inline-block">
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
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
