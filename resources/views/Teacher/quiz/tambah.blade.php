<x-app-layout>
    <x-slot name="header">
        <!-- Breadcrumb Navigation -->
        <nav class="text-sm font-semibold text-gray-500">
            <a href="{{ route('guru.dashboard') }}" class="hover:text-gray-700">DASHBOARD</a> 
            <span class="mx-2">/</span>
            <a href="{{ route('guru.quiz') }}" class="hover:text-gray-700">MANAGE QUIZ</a>
            <span class="mx-2">/</span>
            <span class="text-black">CREATE QUIZ</span>
        </nav>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- New Quiz Form -->
                        <h1 class="text-2xl font-bold mb-5">NEW QUIZ</h1>        

                        <form id="course-form" action="{{ route('store.courses') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Icon Upload Section -->
                            <div class="flex items-center mb-6">
                                <div id="icon-preview" class="w-24 h-24 border-dashed border-2 border-gray-400 flex items-center justify-center rounded-full overflow-hidden">
                                    <img id="icon-image" src="" alt="ICON QUIZ" class="hidden w-full h-full object-cover">
                                </div>
                                <label for="icon" class="ml-4 bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded cursor-pointer">
                                    ADD ICON
                                    <input type="file" name="image" id="icon" class="hidden" accept="image/*">
                                </label>
                            </div>
        
                            <!-- Quiz Name -->
                            <div class="mb-4">
                                <label for="name" class="block text-black-900 font-bold mb-2">NAME</label>
                                <input type="text" name="title" id="name" class="w-full border border-gray-300 rounded-md p-2" placeholder="Write your quiz name" required>
                                @error('title')
                                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="textarea" class="block text-black-900 font-bold mb-2">DESCRIPTION</label>
                                <textarea name="description" id="textarea" cols="30" rows="10" class="w-full border border-gray-300 rounded-md p-2" placeholder="Write description for your Quiz" required></textarea>
                            </div>
        
                            <!-- Access Type -->
                            <div class="mb-4">
                                <label for="access_type" class="block text-black-900 font-bold mb-2">ACCESS TYPE</label>
                                <select name="is_private" id="access_type" class="w-full border border-gray-300 rounded-md p-2" required>
                                    <option value="">Choose Access</option>
                                    <option value="0">Private</option>
                                    <option value="1">Public</option>
                                </select>
                            </div>
        
                            <!-- Submit Button -->
                            <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                                SAVE QUIZ
                            </button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
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

