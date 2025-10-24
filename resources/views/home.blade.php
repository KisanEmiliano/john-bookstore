<x-layout :title="$title">
    {{-- <el-dropdown class="inline-block my-4">
        <button class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white inset-ring-1 inset-ring-white/5 hover:bg-blue-800">
            List Shown
            <svg viewBox="0 0 20 20" fill="currentColor" data-slot="icon" aria-hidden="true" class="-mr-1 size-5 text-white">
            <path d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
            </svg>
        </button>

        <el-menu anchor="bottom end" popover class="w-56 origin-top-right rounded-md bg-gray-800 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
            <div class="py-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Account settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">Support</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:text-white focus:outline-hidden">License</a>
            </div>
        </el-menu>
    </el-dropdown> --}}

    <form class="max-w-md mx-auto mb-8" >  
        
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-100 dark:placeholder-gray-700 dark:text-gray-800 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Book or Author..." autofocus name="keyword" autocomplete="off"/>
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-800 dark:focus:ring-blue-800">Search</button>
        </div>
    </form>

    {{ $books->links() }}
    <div class="overflow-x-auto mt-4">
        <table class="min-w-full border border-gray-300 text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Book Name</th>
                    <th class="px-4 py-2 border">Category Name</th>
                    <th class="px-4 py-2 border">Author Name</th>
                    <th class="px-4 py-2 border">Average Rating</th>
                    <th class="px-4 py-2 border">Voter</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $books->firstItem() + $loop->index }}</td>
                        <td class="px-4 py-2 border">{{ $book['book name'] }}</td>
                        <td class="px-4 py-2 border">{{ $book->category['category name'] }}</td>
                        <td class="px-4 py-2 border">{{ $book->author->name }}</td>
                        <td class="px-4 py-2 border">{{ number_format($book->rating_avg_rating, 2) }}</td>
                        <td class="px-4 py-2 border">{{ $book->rating->count('rating') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-layout>