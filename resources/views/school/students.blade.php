@include('school.header')

    <div class="container">
        <div class="row m-3">
            <div class="col-md-6">
                <a href="{{ URL::to('/school/addStudent') }}" class="btn btn-success"  >إضافة طالب</a>
                <a href="{{ URL::to('/school/addStudents') }}" class="btn btn-primary"  >رفع ملف الطلاب</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم الطالب</th>
                            <th scope="col">رقم الهوية</th>
                            <th scope="col" class="px-6 py-3"> اسم الصف</th>
                            <th scope="col" class="px-6 py-3"> اسم مشرف</th>

                            <th scope="col">تعديل / حذف</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <th scope="row">{{$student->id}}</th>
                                <td>{{$student->name}}</td>
                                <td>{{$student->id_number}}</td>
                                <td class="px-6 py-2">{{ ( ($student->ClassName) ? $student->ClassName->name : '')}} / {{ (($student->ClassName) ? $student->ClassName->Classroom->name : '') }}</td>
                                <td class="px-6 py-2">{{ ( ($student->ClassName) ? $student->ClassName->admin->name: '')}}</td>
                                {{-- <td>{{$student->name}}</td> --}}
                                <td class="px-6 py-2"><a href="{{ route('school_student_edit',$student->id) }}">تعديل</a> / <a href="{{ route('students_delete_school',$student->id) }}">حذف</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('school.footer')
