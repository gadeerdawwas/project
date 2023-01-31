@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-2">
        @if (strlen($message) > 0)
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
    </div>
    <div class="mb-3">
        <h1 class="text-2xl">أضف طالب جديد</h1>
    </div>
    <div class="w-[500px] h-auto pb-8">
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label" > الرجاء رفع ملف CSV لإرضافة الطلاب </label>
                    <input type="file" id="file" name="file" class="input" placeholder="اكتب كلمة المرور "  />
                </div>
                <div class="mb-3">
                    <input type="submit" class="submit" value="إضافة الطلاب"  />
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.footer')
