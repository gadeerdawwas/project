@include('admin.header')

    <div class="w-full bg-white py-10 px-5 h-screen">

        @if (strlen($error_message) > 0)
        <div class="alert alert-danger" role="alert">
            {!! $error_message !!}
        </div>
    @endif

    @if (strlen($message) > 0)
        <div class="alert alert-success" role="alert">
            {{ $message }}
        </div>
    @endif
        <div class="w-full my-6">
            <a href="{{ URL::to('/admin/addBook') }}" class="text-3xl submit"  >إضافة كتاب</a>
        </div>
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
            <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">عنوان الكتاب</th>
                        {{-- <th scope="col" class="px-6 py-3">القسم</th> --}}

                        <th scope="col" class="px-6 py-3">القسم</th>
                        <th scope="col" class="px-6 py-3"> اسم المؤلف </th>
                        <th scope="col" class="px-6 py-3">عدد الصفحات </th>
                        <th scope="col" class="px-6 py-3"> رقم ردمك </th>
                        {{-- <th scope="col" class="px-6 py-3">دار النشر </th> --}}
                        {{-- <th scope="col" class="px-6 py-3">توفر نسخة </th> --}}
                        <th scope="col" class="px-6 py-3">اضافة الكتاب لتحدى القراء </th>

                        <th scope="col" class="px-6 py-3">تصفح الكتاب</th>
                        <th scope="col" class="px-6 py-3">العمليات </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row">{{$book->id}}</th>
                            <td class="px-6 py-2">{{$book->title}}</td>
                            <td class="px-6 py-2">{{$book->Category->name}}</td>

                            {{-- <td class="px-6 py-2">{{$book->Category->name}}</td> --}}

                            <td class="px-6 py-2">{{$book->author}}</td>
                            <td class="px-6 py-2">{{$book->page_number}}</td>
                            <td class="px-6 py-2">{{$book->ISBN}}</td>
                            {{-- <td class="px-6 py-2">{{$book->Publishing_House}}</td> --}}
                            {{-- <td class="px-6 py-2">{{$book->copy}}</td> --}}
                            <td class="px-6 py-2">
                                @if ($book->challenge == 0)
                                    <span style="color: red">غير مفعل</span>
                                @else
                                    <span style="color: green">مفعل</span>
                                @endif
                            </td>
                            <td class="px-6 py-2"><a href="{{ url('/admin/book/'.$book->id.'') }}">تصفح الكتاب</a></td>
                            <td class="px-6 py-2">
                                <a href="{{ route('editbook_admin',$book->id) }}"> تعديل</a> /
                                <a href="{{ route('deletebook_admin',$book->id) }}"> حذف</a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@include('admin.footer')
