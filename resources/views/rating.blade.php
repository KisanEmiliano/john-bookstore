<x-layout :title="$title">
    <h6>input rating</h6>
    <form class="max-w-md mx-auto mb-8">
        @csrf  
        <!-- Book Author -->
        <div class="mb-4 flex items-center">
            <label class="w-32 text-gray-700 font-medium">Book Author :</label>
            <select name="author" class="flex-1 border border-gray-300 rounded px-2 py-1 focus:ring focus:ring-blue-200 focus:border-blue-400" onchange="this.form.submit()">
                <option value="">--Pilih Author--</option>
                @foreach ( $authors as $author )
                    <option value="{{ $author->id }}" {{ $selectedAuthor == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
        </div>    
    </form>

    <form class="max-w-md mx-auto mb-8" method="POST">
        @csrf
        <input type="hidden" name="author" value="{{ $selectedAuthor }}">
         <!-- Book Name -->
        <div class="mb-4 flex items-center">
            <label class="w-32 text-gray-700 font-medium">Book Name :</label>
            <select name="book" class="flex-1 border border-gray-300 rounded px-2 py-1 focus:ring focus:ring-blue-200 focus:border-blue-400">
                <option value="">--Pilih Buku--</option>
                @foreach ( $books as $book )
                    <option value="{{ $book->id }}">{{ $book['book name'] }}</option>
                @endforeach
            </select>
        </div>
        <!-- Rating -->
        <div class="mb-6 flex items-center">
            <label class="w-32 text-gray-700 font-medium">Rating :</label>
            <select name="rating" class="flex-1 border border-gray-300 rounded px-2 py-1 focus:ring focus:ring-blue-200 focus:border-blue-400">
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- Submit Button -->
        <div class="text-center">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-6 rounded">
                SUBMIT
            </button>
        </div>   
        
    </form>
    @if(session('success'))
        <div class="text-green-600">{{ session('success') }}</div>
    @endif
</x-layout>