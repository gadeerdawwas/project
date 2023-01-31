@include('school.header')

    <div class="container">
        <div class="row m-3">
            <div class="col-md-6">
                <a href="{{ URL::to('/school/addAdmin') }}" class="btn btn-success"  >إضافة مشرف</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">اسم المشرف</th>
                            <th scope="col">البريد الالكتروني</th>
                            <th scope="col"> الصف</th>
                            <th scope="col">عمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr>
                                <th scope="row">{{$admin->id}}</th>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>

                                    @if ($admin->ClassName)
                                        @foreach ($admin->ClassName as $class)

                                            <span>( {{ $class->name }}  / {{ (($class->Classroom) ? $class->Classroom->name : '') }} )</span>
                                        @endforeach
                                    @else
                                    <span> 00 </span>
                                    @endif

                                    {{-- {{( ($admin->ClassName) ? $admin->ClassName->name : '')}} --}}

                                </td>
                                <td><a href="{{ route('updateAdmin',$admin->id) }}">تعديل</a> / <a href="{{ route('school_admin_delete',$admin->id) }}">حذف</a> </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('school.footer')
