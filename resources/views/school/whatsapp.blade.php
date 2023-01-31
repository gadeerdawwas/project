@include('school.header')

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
        <h1 class="text-2xl">
            الرسايل التربوية
            </h1>
    </div>
    <div class="w-[500px] h-auto pb-8">
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label" >اسم المرسل إليه</label>
                    <input type="text" name="name" class="input" id="name" placeholder="اكتب الاسم الكامل" />
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label" >رقم الهاتف</label>
                    <input type="text" id="phone" name="phone" class="input" placeholder="05xxxxxx" />
                </div>
                <div class="mb-3">
                    <label for="class" class="form-label" >الصف</label>
                    <textarea class="input" placeholder="نص الرسالة" name="message" ></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" class="submit" value="إرسال الرسالة"  />
                </div>
            </form>
        </div>
    </div>
</div>

@include('school.footer')
