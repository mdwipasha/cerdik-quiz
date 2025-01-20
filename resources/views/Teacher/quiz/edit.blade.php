<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('guru.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a>
            <span class="mx-2">/</span>
            <a href="{{ route('guru.courses') }}" class="hover:text-gray-700">MANAGE COURSE</a>
            <span class="mx-2">/</span>
            <span class="text-black">EDIT COURSE</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Edit Course Form -->
                    <h1 class="text-2xl font-bold mb-5">EDIT COURSE</h1>
                    <form id="course-form" action="{{ route('update.quiz', $quiz->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Icon Upload Section -->
                        <div class="flex items-center mb-6">
                            <div id="icon-preview" class="w-24 h-24 border-dashed border-2 border-gray-400 flex items-center justify-center rounded-full overflow-hidden">
                                <img id="icon-image" src="{{ $quiz->image ? Storage::url($quiz->image) : '' }}" alt="ICON COURSE" class="{{ $quiz->image ? '' : 'hidden' }} w-full h-full object-cover">
                            </div>
                            <label for="icon" class="ml-4 bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded cursor-pointer">
                                ADD ICON
                                <input type="file" name="image" id="icon" class="hidden" accept="image/*">
                            </label>
                        </div>

                        <!-- Course Name -->
                        <div class="mb-4">
                            <label for="name" class="block text-black-900 font-bold mb-2">NAME</label>
                            <input type="text" name="title" id="name" value="{{ old('title', $quiz->title) }}" class="w-full border border-gray-300 rounded-md p-2" placeholder="Write your course name" required>
                            @error('title')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mb-4">
                            <label for="textarea" class="block text-black-900 font-bold mb-2">DESCRIPTION</label>
                            <textarea name="description" id="textarea" cols="30" rows="10" class="w-full border border-gray-300 rounded-md p-2" placeholder="Write description for your course">{{ old('description', $quiz->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Access Type -->
                        <div class="mb-4">
                            <label for="access_type" class="block text-black-900 font-bold mb-2">ACCESS TYPE</label>
                            <select name="is_private" id="access_type" class="w-full border border-gray-300 rounded-md p-2" required>
                                <option value="">Choose Access</option>
                                <option value="0" {{ old('is_private', $quiz->is_private) == 0 ? 'selected' : '' }}>Private</option>
                                <option value="1" {{ old('is_private', $quiz->is_private) == 1 ? 'selected' : '' }}>Public</option>
                            </select>
                            @error('is_private')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                            SAVE COURSE
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const iconUpload = document.getElementById("icon");
        const iconImage = document.getElementById("icon-image");

        iconUpload.addEventListener("change", function () {
            const file = iconUpload.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    iconImage.src = e.target.result;
                    iconImage.classList.remove("hidden");
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</x-app-layout>
