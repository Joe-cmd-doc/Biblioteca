{{-- resources/views/components/books-layout.blade.php --}}
<x-layout>
    <section class="w-full max-w-4xl mx-auto p-4">
        <header class="mb-6">
            <h1 class="text-3xl font-bold text-center">📚 Biblioteca de Libros</h1>
            <p class="text-gray-600 text-center">Consulta todos los libros disponibles</p>
        </header>

        <div>
            {{ $slot }}
        </div>
    </section>
</x-layout>
