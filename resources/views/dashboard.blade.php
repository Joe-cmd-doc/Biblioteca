<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <main class="flex max-w-[335px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row">
            <div class="container">
                <h1 class="text-3xl font-bold mb-4">Listado de Libros</h1>
                @foreach ($books as $book)
                    <div class="p-4 mb-4 border rounded-lg shadow-lg">
                        <h2 class="text-2xl font-semibold">{{ $book->title }}</h2>
                        <p><strong>Author:</strong> {{ $book->author }}</p>
                        <p><strong>Publication Year:</strong> {{ $book->publication_year }}</p>
                        <p><strong>Description:</strong> {{ $book->description }}</p>
                        <a href="{{ route('books', $book->id) }}" class="btn btn-info">Ver detalles</a>
                    </div>
                @endforeach
            </div>
        </main>
    </x-slot>




</x-app-layout>
