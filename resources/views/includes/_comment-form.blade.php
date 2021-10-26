@auth
    <form method="POST" class="border border-gray-200 p-6 rounded-xl" action="{{ route('comments.store', [$post->slug]) }}">
        @csrf

        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="Random avatar" width="40" height="40" class="rounded-full">
            <h2 class="ml-4">Want to participate?</h2>
        </header>

        <div class="mt-6">
                        <textarea
                            rows="5"
                            class="w-full text-sm focus:outline-none focus:ring"
                            placeholder="Quick, think of something to say!"
                            name="body"
                            required
                        ></textarea>

            @error('body')
            <x-form-error>{{ $message }}</x-form-error>
            @enderror
        </div>

        <div class="flex justify-end mt-6 border-t border-gray-200 pt-6">
            <button type="submit" class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">Post</button>
        </div>
    </form>
@else
    <p class="font-semibold">
        <a href="{{ route('login.create') }}" class="hover:underline text-blue-500">Login</a> to comment.
    </p>
@endauth
