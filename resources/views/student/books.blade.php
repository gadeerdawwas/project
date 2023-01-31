@include('student.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
            @if ($books->count() == 0)
                <h2 class="text-gray-400 text-3xl">لا توجد كتب في هذا القسم</h2>
            @else
                @php
                    $books = $books->get(['books.*', 'categories.name', 'files.file_name']);
                @endphp
                <h2 class="text-3xl"> كتب: {{ $books[0]->name }}</h2>
            @endif


            
        </div>
        <div class="grid mt-8 grid-cols-1 lg:grid-col-5 md:grid-cols-4  gap-4 place-items-stretch h-56">
            @foreach ($books as $book)
                <div class="row">
                    <a href="{{ url('/book/'.$book->id.'') }}" class="cover-title">
                        <div class="block text-center p-6 h-52 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700" >
                            <img src="{{url('cover.png')}}" alt="">
                            <h2 class="mx-auto my-2">{{$book->title}}</h2>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@include('student.footer')
