@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
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
    <div class="mb-3">
        <h1 class="text-2xl">أضف نشاط</h1>
    </div>
    <div class="w-[600px] h-auto pb-8">
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">
            <form action="{{ route('activities.store') }}" method="post" >
                @csrf

                <div class="mb-3">
                    <label for="id_number" class="form-label" > عنوان</label>
                    <input type="text" name="title" class="input" id="title" placeholder="اكتب  عنوان النشاط  " />
                </div>
                <div class="mb-3">
                    <label for="id_number" class="form-label" > رابط</label>
                    <input type="text" name="link" class="input" id="link" placeholder="اكتب  رابط النشاط  " />
                </div>

                <div class="mb-3">
                    <button class="btn btn-success">حفظ </button>
                </div>


            </form>
        </div>
    </div>
</div>

@include('admin.footer')
