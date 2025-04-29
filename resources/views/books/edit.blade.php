<x-app-layout>
    <div class="container mx-auto px-4 py-8">

        <div class="bg-white shadow-lg rounded-lg p-8 relative">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Edit Book</h1>


            <form action="{{ route('books.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ $book->title }}" required>
                </div>


                <div class="mb-4">
                    <label for="author" class="block text-lg font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ $book->author }}" required>
                </div>


                <div class="mb-4">
                    <label for="publication_year" class="block text-lg font-medium text-gray-700">Publication Year</label>
                    <input type="number" name="publication_year" id="publication_year" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" value="{{ $book->publication_year }}" required>
                </div>


                <div class="mb-6">
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" rows="4">{{ $book->description }}</textarea>
                </div>


                <div class="absolute bottom-8 right-8">
                    <button type="submit" class="px-8 py-4 bg-gray-400 text-black font-bold rounded-lg shadow-lg hover:bg-gray-500 focus:outline-none focus:ring-4 focus:ring-gray-300 transition-all duration-300">
                        Update Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
