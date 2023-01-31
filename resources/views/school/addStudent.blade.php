@include('school.header')

<div class="container">
    <div class="row">
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
    <div class="row">
        <h1>أضف طالب جديد</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-5">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="id_number" class="form-label" >اسم الطالب</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="اكتب اسم الطالب الكامل" />
                </div>
                <div class="mb-3">
                    <label for="id_number" class="form-label" >رقم الهوية</label>
                    <input type="text" id="id_number" name="id_number" class="form-control" placeholder="اكتب رقم الهوية" />
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label" >الصف</label>
                    <select  name="class" id="class" class="form-control" >
                        @foreach ($classes as $class)
                            <option value="{{$class->id}}">{{$class->name}} /  {{ $class->Classroom->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label" >كلمة المرور</label>
                    <input type="text" id="password" name="password" class="form-control" placeholder="اكتب كلمة المرور " value="abc123" />
                </div>
                <div class="mb-3">
                    <input type="submit"  style="background-color: green"  class="btn btn-success" value="إضافة الطالب"  />
                </div>
            </form>
        </div>
    </div>
</div>

@include('school.footer')
