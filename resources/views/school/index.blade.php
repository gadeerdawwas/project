@include('school.header')

    <div class="container">
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
        <div class="row m-3">
            <div class="col-md-12">
                <p>رابط مكتبتك</p>
                <a href="{{ URL::to("/$username") }}" target="_blank">{{ URL::to("/$username") }}</a>
            </div>
        </div>
        <div class="row m-3">
            <div class="col-md-6">
                <a href="{{ URL::to('/school/addBook') }}" class="submit"  >إضافة كتاب</a>
            </div>
        </div>
        <div class="row">
            <div class="">
                {{-- <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">عنوان الكتاب</th>
                            <th scope="col">القسم</th>
                            <th scope="col">تصفح الكتاب</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($books as $book)
                            <tr>
                                <th scope="row">{{$book->id}}</th>
                                <td>{{$book->title}}</td>
                                <td>{{$book->name}}</td>
                                <td class="px-6 py-2"><a href="{{route('admin.singlebook',$book->id) }}">تصفح الكتاب</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}

                <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">  عنوان الكتاب  </th>
                            {{-- <th scope="col" class="px-6 py-3">القسم</th> --}}

                            <th scope="col" class="px-6 py-3">القسم</th>
                            <th scope="col" class="px-6 py-3"> اسم المؤلف </th>
                            <th scope="col" class="px-6 py-3">عدد الصفحات </th>
                            <th scope="col" class="px-6 py-3"> رقم ردمك </th>
                            {{-- <th scope="col" class="px-6 py-3">دار النشر </th> --}}
                            {{-- <th scope="col" class="px-6 py-3">توفر نسخة </th> --}}
                            <th scope="col" class="px-6 py-3">اضافة الكتاب لتحدى القراء </th>

                            <th scope="col" class="px-6 py-3">تصفح الكتاب</th>
                            <th scope="col" class="px-6 py-3"> العمليات</th>
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
                                <td class="px-6 py-2"><a href="{{ url('/school/book/'.$book->id.'') }}">تصفح الكتاب</a></td>
                                <td class="px-6 py-2">
                                   <a href="{{ route('editbook_school',$book->id) }}">تعديل</a> /
                                   <a href="{{ route('deletebook_school',$book->id) }}">حذف</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('school.footer')
