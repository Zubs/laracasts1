<x-layout>
    <form method="POST">
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
            >

            <textarea
                class="description bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none"
                spellcheck="false"
                placeholder="Describe everything about this post here"
                required
                name="body"
            ></textarea>

            <select class="mt-4 bg-gray-100 border border-gray-300 p-1 outline-none text-gray-400" name="category" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ ucwords($category->name) }}</option>
                @endforeach
            </select>

            <button type="submit" class="mt-3 btn border border-blue-500 rounded-2xl p-1 px-4 font-semibold cursor-pointer text-white ml-2 bg-blue-500">Post</button>
        </div>
    </form>
</x-layout>
