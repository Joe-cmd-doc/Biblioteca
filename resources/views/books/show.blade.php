<x-app-layout>
    <section class="max-w-5xl mx-auto py-16 px-6">
        <div class="bg-white dark:bg-zinc-900 rounded-3xl shadow-2xl border border-zinc-200 dark:border-zinc-700 overflow-hidden flex flex-col lg:flex-row">
            <!-- Book image -->
            <div class="lg:w-1/2 w-full">
                <img
                    src="{{ $book->image_url ?? 'https://static.vecteezy.com/system/resources/previews/024/644/149/non_2x/stack-of-books-pile-of-books-isolated-on-white-background-colorful-illustration-vector.jpg' }}"
                    alt="Cover of {{ $book->titol }}"
                    class="object-cover w-full h-full max-h-[600px]"
                >
            </div>

            <!-- Book details -->
            <div class="lg:w-1/2 w-full p-10 flex flex-col justify-between">
                <div>
                    <h1 class="text-5xl font-bold text-zinc-900 dark:text-white mb-8 tracking-tight">
                        {{ $book->titol }}
                    </h1>

                    <div class="space-y-6 text-lg text-zinc-700 dark:text-zinc-300 leading-relaxed">
                        <p>
                            <span class="font-medium text-zinc-500 dark:text-zinc-400">Author:</span>
                            <span class="block text-2xl font-semibold text-zinc-800 dark:text-white">{{ $book->author }}</span>
                        </p>

                        <p>
                            <span class="font-medium text-zinc-500 dark:text-zinc-400">Publication Year:</span>
                            <span class="block text-xl font-semibold text-zinc-800 dark:text-white">{{ $book->publication_year}}</span>
                        </p>

                        <p>
                            <span class="font-medium text-zinc-500 dark:text-zinc-400">Description:</span>
                            <span class="block mt-2 text-zinc-700 dark:text-zinc-300">
                                {{ $book->description }}
                            </span>
                        </p>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="/dashboard"
                       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl transition-all duration-300 shadow-md">
                        ← Back to list
                    </a>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="mt-16">
            <h2 class="text-3xl font-semibold text-zinc-900 dark:text-white mb-6">Reviews</h2>

            @forelse ($book->reviews as $review)
    <div class="mb-8 p-6 bg-white dark:bg-zinc-800 rounded-2xl shadow-lg border border-zinc-200 dark:border-zinc-700 transition duration-300">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                ⭐
                <span class="text-yellow-600 font-semibold">{{ $review->rating }}/5</span>
            </div>
            <span class="text-xs text-gray-500 dark:text-gray-400">User #{{ $review->user_id }}</span>
        </div>

        <p class="text-gray-800 dark:text-zinc-200 leading-relaxed italic mb-4">
            "{{ $review->content }}"
        </p>

        <div class="flex justify-end gap-4">
            <form action="{{ route('reviews.edit', $review->id) }}" method="GET">

            <button type="submit" class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-black text-sm font-semibold rounded-xl transition duration-300 shadow">
                Edit
            </button>


            </form>

            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST"
                  onsubmit="return confirm('Are you sure you want to delete this review?');">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-semibold rounded-xl transition duration-300 shadow">
                    Delete
                </button>
            </form>
        </div>
    </div>
            @empty
                <p class="text-zinc-500 dark:text-zinc-400 italic text-center mt-8">There are no reviews yet.</p>
            @endforelse



            @auth
            <div class="mt-8 mb-24">
                <div class="bg-white p-4 rounded-xl shadow-md text-center">
                    <a href="{{ route('reviews.create', ['bookId' => $book]) }}"
                        class="inline-block px-6 py-3 text-black font-semibold text-lg rounded-xl border border-black hover:bg-gray-100 transition duration-300 ease-in-out">
                        ✍️ Write a Review
                    </a>
                </div>
            </div>

            @endauth
        </div>
    </section>
</x-app-layout>
