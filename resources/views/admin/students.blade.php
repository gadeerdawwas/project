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
                <a href="{{ URL::to('/admin/addStudent') }}" class="btn btn-success"  >إضافة طالب</a>
                <a href="{{ URL::to('/admin/importStudents') }}" class="btn btn-primary"  >رفع ملف الطلاب</a>
            </div>
        </div>
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
            <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">رقم الهوية</th>
                        <th scope="col" class="px-6 py-3">اسم الطالب</th>
                        <th scope="col" class="px-6 py-3"> اسم الصف</th>
                        <th scope="col" class="px-6 py-3"> اسم مشرف</th>
                        <th scope="col" class="px-6 py-3">تعديل / حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" >
                            <th scope="col">{{$student->id}}</th>
                            <td class="px-6 py-2">{{$student->id_number}}</td>
                            <td class="px-6 py-2">{{$student->name}}</td>
                            <td class="px-6 py-2">{{ ( ($student->ClassName) ? $student->ClassName->name : '')}} / {{ (($student->ClassName) ? $student->ClassName->Classroom->name : '') }}</td>
                            {{-- <td class="px-6 py-2">{{ ( ($student->ClassName) ? $student->ClassName->name : '')}} / {{ (($student->ClassName) ? $student->ClassName->Classroom->name : '') }}</td> --}}
                            <td class="px-6 py-2">{{ ( ($student->ClassName) ? $student->ClassName->admin->name: '')}}</td>
                            <td class="px-6 py-2"><a href="{{ route('student_edit',$student->id) }}">تعديل</a> / <a href="{{ route('students_delete',$student->id) }}">حذف</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@include('admin.footer')
