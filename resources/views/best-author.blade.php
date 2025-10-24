<x-layout :title="$title">
    <h6 class="text-xl font-bold text-center">Top 10 Most Famous Author</h6>
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border border-gray-300 text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Author Name</th>
                    <th class="px-4 py-2 border">Voter</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $loop->iteration}}</td>
                        <td class="px-4 py-2 border">{{ $author['name'] }}</td>
                        <td class="px-4 py-2 border">{{ $author->ratings->count('rating') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>