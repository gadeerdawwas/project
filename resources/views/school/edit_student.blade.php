@include('school.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-2">

    </div>
    <div class="mb-3">
        <h1 class="text-2xl">تعديل طالب جديد</h1>
    </div>


    <div class="w-[500px] h-auto pb-8">
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 ">
            <form action="{{ route('school_student_update',$students->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="id_number" class="form-label" >اسم الطالب</label>
                    <input type="text" name="name" class="input" id="name" value="{{ $students->name }}" placeholder="اكتب اسم الطالب الكامل" />
                </div>
                <div class="mb-3">
                    <label for="id_number" class="form-label" >رقم الهوية</label>
                    <input type="text" id="id_number" name="id_number"  value="{{ $students->id_number }}" class="input" placeholder="اكتب رقم الهوية" />
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label" >الصف</label>
                    <select class="input" name="class" id="class">
                        @foreach ($classes as $class)
                            <option @if ( $students->class == $class->id)
                                selected
                            @endif  value="{{$class->id}}"> {{$class->name}} /  {{ $class->Classroom->name }} </option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="password" class="form-label" >كلمة المرور</label>
                    <input type="text" id="password" name="password" class="input" placeholder="اكتب كلمة المرور " value="abc123" />
                </div> --}}
                <div class="mb-3">
                    <input type="submit" class="submit" value="تعديل الطالب"  />
                </div>
            </form>
        </div>
    </div>
</div>

@include('school.footer')
