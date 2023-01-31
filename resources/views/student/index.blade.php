@include('student.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-2">        
        <h2 class="text-3xl">أقسام المكتبة</h2>        
    </div>
    <div class="grid grid-cols-1 lg:grid-col-5 md:grid-cols-4  gap-4 place-items-stretch h-56">
        @foreach ($categories as $category)        
            <a href="{{ url('/books/'.$category->id.'') }}" class="block text-center p-6 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">{{$category->name}}</h2>                
            </a>                    
        @endforeach
    </div>
</div>

@include('student.footer')