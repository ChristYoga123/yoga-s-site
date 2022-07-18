<x-app-layout>
    <x-slot name="header">
        {{ __('Edit Project') }}
    </x-slot>
    <div class="font-bold text-primary">
        <a href="{{ route('projects.dashboard') }}"><i class="fa-solid fa-arrow-left"></i> Back to Dashboard</a>
    </div>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <form action="{{ route('projects.update', $project->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-10">
                <label for="name" class="text-2xl font-bold">Name</label><br>
                <input type="text" placeholder="Type here" class="input input-bordered w-full lg:w-[500px] mt-3" name="name" id="name" value="{{ $project->name }}" autofocus required/>
            </div>
            <div class="mb-10">
                <label for="slug" class="text-2xl font-bold">Slug</label><br>
                <input type="text" placeholder="Type here" class="input input-bordered w-full lg:w-[500px] mt-3" name="slug" id="slug" value="{{ $project->slug }}" readonly required/>
            </div>
            <div class="mb-10">
                <label for="status" class="text-2xl font-bold">Status</label><br>
                <select class="select select-bordered w-full max-w-xs mt-3" id="status" name="status">
                    @if ($project->status === 'Development')
                        <option value="Development" selected>Development</option>
                        <option value="Finished">Finished</option>
                    @elseif($project->status === 'Finished')
                        <option value="Development">Development</option>
                        <option value="Finished" selected>Finished</option>
                    @else
                        <option value="Development">Development</option>
                        <option value="Finished">Finished</option>
                    @endif
                </select>
            </div>
            <div class="mb-10">
                <div class="mb-10">
                    <label for="hero_image" class="text-2xl font-bold">Hero Image</label><br>
                    @if ($project->hero_image)
                        <img src="{{ asset('storage/' . $project->hero_image) }}" class="img-preview w-[300px]">
                    @else
                        <img class="img-preview w-[300px]">
                    @endif
                    <input type="file" placeholder="Type here" class="mt-3 input input-bordered @error('hero_image') input-error @enderror" name="hero_image" id="hero_image"  onchange="previewImage()"/>
                    @error('hero_image')
                        <br>
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="mb-10">
                <label for="description" class="text-2xl font-bold">Description</label><br>
                <input id="description" type="hidden" name="description" required value="{{ $project->description }}">
                <trix-editor input="description"></trix-editor>
                @error('description')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div class="mt-3">
                <button class="btn btn-primary" type="submit">Edit</button>
            </div>
        </form>

    </div>

    <script>
        // create auto slug
        document.getElementById('name').addEventListener('keyup', function(e) {
            document.getElementById('slug').value = e.target.value.toLowerCase().replace(/ /g, '-');
        });

        function previewImage(){
            const imageInput = document.querySelector('#hero_image');
            const imagePreview = document.querySelector('.img-preview'); 

            imagePreview.style.display = 'block';

            const ofReader = new FileReader();
            ofReader.readAsDataURL(imageInput.files[0]);
            ofReader.onload = function(ofReaderEvent){
                imagePreview.src = ofReaderEvent.target.result;
            };
        }
    </script>
</x-app-layout>

