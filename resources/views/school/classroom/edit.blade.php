@include('school.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="mb-3">
        <h1 class="text-xl font-bold">تعديل صف </h1>
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
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 ">
            <form action="{{ route('classrooms.update',$Classroom->id) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="id_number" class="form-label" >اسم فصل    </label>
                    <input type="text" name="name" class="input" value="{{ $Classroom->name }}" required id="name" />
                </div>
                <div class="mb-3">
                    <button class="btn btn-success">تعديل </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('school.footer')
