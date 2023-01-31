@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-4">
        <h1 class="text-3xl">  عرض تحديات الطلاب</h1>
    </div>
    <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
        <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    {{-- <th scope="col" class="px-6 py-3">عنوان الكتاب</th> --}}
                    <th scope="col" class="px-6 py-3">اسم الطالب</th>
                    <th scope="col" class="px-6 py-3"> الصف</th>

                    {{-- <th scope="col" class="px-6 py-3">اسم المؤلف </th>

                    <th scope="col" class="px-6 py-3">دار النشر</th>

                    <th scope="col" class="px-6 py-3">عدد الصفحات</th> --}}
                    {{-- <th scope="col" class="px-6 py-3">ملخص الكتاب</th> --}}
                    {{-- <th scope="col" class="px-6 py-3">تاريخ إكمال الكتاب</th> --}}
                    <th scope="col" class="px-6 py-3"> حالة</th>
                    <th scope="col" class="px-6 py-3"> تفاصيل</th>
                    {{-- <th scope="col" class="px-6 py-3"> تعديل</th> --}}
                </tr>
            </thead>
            <tbody>
                @if ($ReadingChallange->count()>0)


                @foreach($ReadingChallange as $request)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row">{{$loop->iteration}}</th>
                      {{-- <td class="px-6 py-2">{{$request->title}}</td> --}}
                      <td class="px-6 py-2"><a href="{{  route('readChallange_user',$request->Student->id) }}">{{$request->Student->name}}</a> </td>
                      <td class="px-6 py-2"><a href="{{  route('readChallange_user',$request->Student->id) }}">{{ ( ($request->Student->ClassName) ? $request->Student->ClassName->name : '') }}</a> </td>
                      {{-- <td class="px-6 py-2">{{$request->school_id}}</td> --}}

                      {{-- <td class="px-6 py-2">{{$request->writer_name}}</td>
                      <td class="px-6 py-2">{{$request->publishing_house}}</td>
                      <td class="px-6 py-2">{{$request->pages}}</td> --}}
                      {{-- <td class="px-6 py-2">{{$request->summary}}</td> --}}
                      {{-- <td class="px-6 py-2">{{$request->complete_date}}</td> --}}
                      <td class="px-6 py-2">

                        <span style="color: green"> معتمد</span>


                      </td>
                      <td class="px-6 py-2"> <a href="{{  route('readChallange_user',$request->Student->id) }}">  <i class="fa-solid fa-eye"></i></a>  </td>
                      {{-- <td class="px-6 py-2"><a href="{{ route('readChallange_edit',$request->Student) }}">تعديل <i class="fa-solid fa-pen-to-square"></i></a> </td> --}}
                        {{-- <td class="px-6 py-2">{{ $request->class_name }}</td> --}}
                        {{-- <td class="px-6 py-2">{{$request->total}}</td> --}}
                    </tr>
                @endforeach

                @endif
            </tbody>
        </table>
    </div>
</div>

@include('admin.footer')
