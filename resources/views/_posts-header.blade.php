<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <x-dropdown>
                <x-slot name="trigger">
                    <button class="py-2 pl-3 pr-9 text-sm font-semibold w-32 text-left inline-flex">
                        {{ request('category') ?? 'All' }}
                        <x-icon name="down-arrow" class="absolute pointer-events-none"></x-icon>
                    </button>
                </x-slot>

                <x-dropdown-item href="/" :active="!request('category')">All</x-dropdown-item>

                @foreach($categories as $category)
                    <x-dropdown-item href="/?category={{ $category->slug }}" :active='request("category") === $category->slug'>{{ ucwords($category->name) }}</x-dropdown-item>
                @endforeach
            </x-dropdown>
        </div>

        <!-- Other Filters -->
{{--        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">--}}
{{--            <select class="flex-1 appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold">--}}
{{--                <option value="category" disabled selected>Other Filters--}}
{{--                </option>--}}
{{--                <option value="foo">Foo--}}
{{--                </option>--}}
{{--                <option value="bar">Bar--}}
{{--                </option>--}}
{{--            </select>--}}

{{--            <x-icon name="down-arrow" class="absolute pointer-events-none"></x-icon>--}}
{{--        </div>--}}

        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET">
                <input
                    type="text"
                    name="search"
                    placeholder="Find something"
                    class="bg-transparent placeholder-black font-semibold text-sm"
                    value="{{ request('search') }}"
                >
            </form>
        </div>
    </div>
</header>
