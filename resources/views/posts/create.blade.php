<x-layout>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf

        <div class="heading text-center font-bold text-2xl m-5 text-gray-800">New Post</div>
        <div class="editor mx-auto w-10/12 flex flex-col text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
            <input
                class="title bg-gray-100 border border-gray-300 p-2 mb-4 outline-none"
                spellcheck="false"
                placeholder="Title"
                type="text"
                name="title"
                required
                value="{{ old('title') }}"
            >

            @error('title')
                <x-form-error>{{ $message }}</x-form-error>
            @enderror

            <textarea
                class="description bg-gray-100 sec p-3 mt-4 h-60 border border-gray-300 outline-none"
                spellcheck="false"
                placeholder="Describe everything about this post here"
                required
                name="body"
            >{{ old('body') }}</textarea>

            @error('body')
                <x-form-error>{{ $message }}</x-form-error>
            @enderror

            <select
                class="mt-4 bg-gray-100 border border-gray-300 p-1 outline-none text-gray-400"
                name="category_id"
                required
            >
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : '' }}
                    >{{ ucwords($category->name) }}</option>
                @endforeach
            </select>

            @error('category_id')
                <x-form-error>{{ $message }}</x-form-error>
            @enderror

            <button type="submit" class="mt-3 btn border border-blue-500 rounded-2xl p-1 px-4 font-semibold cursor-pointer text-white ml-2 bg-blue-500">Post</button>
        </div>
    </form>
</x-layout>
