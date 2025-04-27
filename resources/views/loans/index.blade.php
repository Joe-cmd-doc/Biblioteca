<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-4xl mx-auto">
            <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Book Loans</h1>

            <table class="w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Book</th>
                        <th class="px-4 py-2 text-left">User</th>
                        <th class="px-4 py-2 text-left">Start Date</th>
                        <th class="px-4 py-2 text-left">End Date</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($loans as $loan)
                        <tr>
                            <td class="px-4 py-2">{{ $loan->book->title }}</td>
                            <td class="px-4 py-2">{{ $loan->user->name }}</td>
                            <td class="px-4 py-2">{{ $loan->start_date }}</td>
                            <td class="px-4 py-2">{{ $loan->end_date }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('loans.destroy', $loan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-200">
                                        Return Book
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
