<div x-data="{ open: true }" class="py-2 flex flex-col sm:py-12">
    <div  x-show="open"
          x-transition:enter-start="opacity-0 scale-90"
          x-transition:enter="transition duration-200 transform ease"
          x-transition:leave="transition duration-200 transform ease"
          x-transition:leave-end="opacity-0 scale-90"
          class="max-w-screen-sm mx-auto fixed bg-white p-5 bottom-10 right-10 rounded-lg drop-shadow-2xl flex gap-4 flex-wrap md:flex-nowrap text-center md:text-left items-center justify-center md:justify-between bg-gray-100">
        <div class="w-full">{{ $slot }}</div>
        <div class="flex gap-4 items-center flex-shrink-0">
            <button @click="open = false" class="bg-blue-500 px-5 py-2 text-white rounded-md hover:bg-indigo-700 focus:outline-none">
                <x-icon name="close" style="color: white"></x-icon>
            </button>
        </div>
    </div>
</div>
