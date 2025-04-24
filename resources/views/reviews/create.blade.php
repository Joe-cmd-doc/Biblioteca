<x-app-layout>
    <div class="container mx-auto py-12 px-6">
        <h1 class="text-3xl font-bold mb-6 text-black">Write Review</h1>

        <form action="{{ route('reviews.store', $book->id) }}" method="POST" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
            @csrf
            <div>
                <label for="content" class="block text-sm font-medium text-gray-900">Review</label>
                <textarea name="content" id="content" rows="4" required
                          class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 bg-white text-black border-gray-300">
                </textarea>
            </div>

            <div>
                <label for="rating" class="block text-sm font-medium text-gray-900">Rate (1 to 5)</label>
                <input type="number" name="rating" id="rating" min="1" max="5" required
                class="mt-1 block w-24 rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 bg-white text-black border-gray-300">

            </div>

            <button type="submit"
            class="bg-indigo-600 hover:bg-indigo-700 text-black font-semibold px-6 py-3 rounded-xl transition-all duration-300 shadow-md">
             Save Review
            </button>

        </form>
    </div>
</x-app-layout>
