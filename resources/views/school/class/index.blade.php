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
            <div class="col-md-6">
                <a href="{{ route('classes.create') }}" class="submit"  >إضافة صف</a>
            </div>
        </div>
        <div class="row">
            <div class="">


                <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">صف </th>
                            <th scope="col" class="px-6 py-3">رقم صف </th>
                            <th scope="col" class="px-6 py-3">مشرف </th>

                            <th scope="col" class="px-6 py-3"> العمليات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($classes as $class)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row">{{$class->id}}</th>
                                <td class="px-6 py-2">{{$class->name}} /  {{(($class->Classroom) ? $class->Classroom->name : '')}} </td>
                                <td class="px-6 py-2">{{$class->number}}</td>
                                <td class="px-6 py-2">{{($class->Admin) ? $class->Admin->name : 'لا يوجد مشرف '}}</td>


                                <td class="px-6 py-2">
                                   <a href="{{ route('classes.edit',$class->id) }}">تعديل</a> /
                                   <a href="{{ route('class_delete_school',$class->id) }}">حذف</a>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('school.footer')
