<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Loan a Book</h1>

            <form action="{{ route('loans.store') }}" method="POST">
                @csrf


                <div class="mb-6">
                    <label for="start_date" class="block text-lg font-medium text-gray-700">Start Date</label>
                    <input type="date" name="start_date" id="start_date"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                           required min="{{ $startDateMin }}">
                </div>


                <div class="mb-6">
                    <label for="end_date" class="block text-lg font-medium text-gray-700">End Date</label>
                    <input type="date" name="end_date" id="end_date"
                           class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500"
                           required min="{{ \Carbon\Carbon::parse($startDateMin)->addDay()->toDateString() }}">
                </div>


                <div class="mb-6">
                    <label class="block text-lg font-medium text-gray-700">Book</label>
                    <p class="mt-1 block w-full px-4 py-2 text-gray-800 font-semibold">{{ $book->title }}</p>
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                </div>


                <div class="flex justify-start mt-8">
                    <button type="submit" class="px-6 py-3 bg-green-500 text-black font-semibold rounded-lg shadow-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-300">
                        Loan Book
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
