@include('admin.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
            <div class="w-full my-2">
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
            </div>
            <div class="col-md-6">
                <a href="{{ URL::to('/admin/addTeacher') }}" class="btn btn-success"  >إضافة معلم</a>
            </div>
        </div>
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
            <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">الاسم</th>
                        <th scope="col" class="px-6 py-3">البريد الالكتروني</th>
                        <th scope="col" class="px-6 py-3">تعديل / حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr class="bg-white border-b broder-b-[0.5px] dark:bg-gray-800 dark:border-gray-700" >
                            <th scope="col">{{$teacher->id}}</th>
                            <td class="px-6 py-2">{{$teacher->name}}</td>
                            <td class="px-6 py-2">{{$teacher->email}}</td>
                            <td class="px-6 py-2"><a href="{{ route('editTeacher',$teacher->id) }}">تعديل</a> / <a href="{{ route('deleteTeacher',$teacher->id) }}">حذف</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@include('admin.footer')
