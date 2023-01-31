@include('student.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full">
        <h1 class="mt-4 mb-8 text-2xl">مسابقة تحدي القراءة العربي</h1>
    </div>

    <div class="w-auto mx-20">
        <div class="p-5 bg-yellow-200 rounded-xl">
            @if (strlen($error_message) > 0)
                <div class="danger" role="alert">
                    {!! $error_message !!}
                </div>
            @endif

            @if (strlen($message) > 0)
                <div class="success" role="alert">
                    {{ $message }}
                </div>
            @endif
            <form action="" method="post">
                @csrf
                <div class="relative z-0 w-full mb-6 group">
                    <label for="title" class="label">عنوان الكتاب</label>
                    <input type="text" class="input" name="title" id="title" value="{{ old('title') }}"  placeholder="اكتب العنوان هنا" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="writer_name" class="label">اسم المؤلف</label>
                    <input type="text" class="input" name="writer_name" value="{{ old('writer_name') }}"  placeholder="اكتب اسم المؤلف هنا" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="publishing_house">دار النشر</label>
                    <input type="text" class="input" name="publishing_house" value="{{ old('publishing_house') }}" placeholder="اكتب دار النشر هنا" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="pages">عدد الصفحات (الارقام باللغة الانجليزية)</label>
                    <input type="number" class="input" name="pages"  value="{{ old('pages') }}" placeholder="عدد الصفحات" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="summary">ملخص الكتاب</label>
                    <textarea name="summary" class="input"  placeholder="اكتب ملخص الكتاب هنا" cols="30" rows="10">{{ old('summary') }}</textarea>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="complete_date">تاريخ إكمال الكتاب</label>
                    <input type="date" class="input" value="{{ old('complete_date') }}" name="complete_date"  placeholder="اكتب تاريخ إكمال القراءة" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <button type="submit" class="submit">أرسل البيانات</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row"><br/></div>
</div>

@include('student.footer')
