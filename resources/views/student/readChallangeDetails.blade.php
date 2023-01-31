@include('student.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-4">
        @if ($id == 1)
        <h1 class="text-3xl"> الجواز الاول </h1>
        @elseif ($id == 2)
        <h1 class="text-3xl"> الجواز التاني </h1>
        @elseif ($id == 3)
        <h1 class="text-3xl"> الجواز الثالث </h1>
        @elseif ($id == 4)
        <h1 class="text-3xl"> الجواز الرابع </h1>
        @elseif ($id == 5)
        <h1 class="text-3xl"> الجواز الخامس </h1>

        @endif
    </div>
    <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
        <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">عنوان الكتاب</th>
                    {{-- <th scope="col" class="px-6 py-3">اسم الطالب</th>

                    <th scope="col" class="px-6 py-3">اسم المؤلف </th>

                    <th scope="col" class="px-6 py-3">دار النشر</th>

                    <th scope="col" class="px-6 py-3">عدد الصفحات</th> --}}

                    {{-- <th scope="col" class="px-6 py-3">تاريخ إكمال الكتاب</th> --}}
                    <th scope="col" class="px-6 py-3"> حالة</th>
                    {{-- <th scope="col" class="px-6 py-3"> تفاصيل</th>
                    <th scope="col" class="px-6 py-3"> تعديل</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($ReadingChallange as $request)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row">{{$request->id}}</th>
                      <td class="px-6 py-2">{{$request->title}}</td>
                      {{-- <td class="px-6 py-2">{{$request->Student->name}}</td>


                      <td class="px-6 py-2">{{$request->writer_name}}</td>
                      <td class="px-6 py-2">{{$request->publishing_house}}</td>
                      <td class="px-6 py-2">{{$request->pages}}</td>

                      <td class="px-6 py-2">{{$request->complete_date}}</td> --}}
                      <td class="px-6 py-2">
                        @if ($request->state == 0)
                            <span class="" style="color: red"> قيد الانتظار</span>
                        @else
                        <span style="color: green"> تم الاعتماد  </span>

                        @endif
                      </td>
                      {{-- <td class="px-6 py-2"> <a href="{{ route('readChallange_show',$request->id) }}">  <i class="fa-solid fa-eye"></i></a>  </td>
                      <td class="px-6 py-2"><a href="{{ route('readChallange_edit',$request->id) }}">تعديل <i class="fa-solid fa-pen-to-square"></i></a> </td> --}}
                        {{-- <td class="px-6 py-2">{{ $request->class_name }}</td> --}}
                        {{-- <td class="px-6 py-2">{{$request->total}}</td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('student.footer')
