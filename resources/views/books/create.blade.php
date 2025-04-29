<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Add New Book</h1>

            <form action="{{ route('books.store') }}" method="POST">
                @csrf


                <div class="mb-6">
                    <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>


                <div class="mb-6">
                    <label for="author" class="block text-lg font-medium text-gray-700">Author</label>
                    <input type="text" name="author" id="author" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>


                <div class="mb-6">
                    <label for="publication_year" class="block text-lg font-medium text-gray-700">Publication Year</label>
                    <input type="number" name="publication_year" id="publication_year" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" required>
                </div>


                <div class="mb-6">
                    <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500" rows="4"></textarea>
                </div>


                <div class="flex justify-start">
                    <button type="submit" class="px-6 py-3 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">
                        Save Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
