@include('school.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="mb-3">
        <h1 class="text-xl font-bold">تعديل  مشرف جديد</h1>
    </div>
    <div class="w-[500px] h-auto">
        <div class="col-md-12 m-2">
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
    </div>
    <div class="w-[500px] h-auto pb-8">
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">
            <form action="{{ route('updatesAdmin',$Admin->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="id_number" class="form-label" >اسم المشرف</label>
                    <input type="text" name="name" class="input" id="name" value="{{ $Admin->name }}" placeholder="اكتب اسم المشرف الكامل" />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" >الايميل</label>
                    <input type="text" id="email" name="email" class="input"  value="{{ $Admin->email }}" placeholder="اكتب الايميل" />
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label" >الصف</label>
                    <select class="input" name="class" id="class">
                        <option value="كامل المدرسة">كامل المدرسة</option>
                        @foreach ($classes as $class)
                            <option @if ($class->id == $Admin->class)
                                selected
                            @endif  value="{{$class->id}}">{{$class->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <input type="submit" class="submit" value="نعديل المشرف"  />
                </div>
            </form>
        </div>
    </div>
</div>

@include('school.footer')
