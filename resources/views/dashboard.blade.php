<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div class="container">
                <!-- Botones en la parte superior derecha -->
                <div class="flex justify-end mb-4 space-x-4">
                    <!-- Botón para agregar libro -->
                    <a href="{{ route('books.create') }}" class="px-6 py-3 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">
                        Add Book
                    </a>

                    <!-- Botón para ver préstamos -->
                    <a href="{{ route('loans.index') }}" class="px-6 py-3 bg-blue-500 text-black font-semibold rounded-lg shadow-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
                        View Loans
                    </a>
                </div>

                <h1 class="text-3xl font-bold mb-4">List of books</h1>
                @foreach ($books as $book)
                    <div class="p-6 mb-6 border rounded-xl shadow-lg bg-gray-50 hover:bg-gray-100 transition duration-300 ease-in-out">
                        <h2 class="text-2xl font-semibold text-gray-800">{{ $book->title }}</h2>
                        <p class="text-gray-600"><strong>Author:</strong> {{ $book->author }}</p>
                        <p class="text-gray-600"><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
                        <p class="text-gray-600"><strong>Description:</strong> {{ $book->description }}</p>

                        <a href="{{ route('books.show', $book->id) }}" class="inline-block mt-4 px-6 py-2 bg-blue-600 text-black font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                            View Details
                        </a>

                        <a href="{{ route('books.edit', $book->id) }}" class="inline-block mt-2 px-6 py-2 bg-yellow-500 text-black font-semibold rounded-lg shadow-md hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition duration-200">
                            Edit
                        </a>

                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline-block mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200">
                                Delete
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </main>
    </x-slot>
</x-app-layout>
