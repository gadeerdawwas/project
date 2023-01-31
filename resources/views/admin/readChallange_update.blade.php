@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full">
        <h1 class="mt-4 mb-8 text-2xl">مسابقة تحدي القراءة العربي</h1>
    </div>

    <div class="w-auto mx-20">
        <div class="p-5 bg-yellow-200 rounded-xl">

            <form action="{{ route('readChallange_update',$ReadingChallange->id) }}" method="post">
                @csrf
                <div class="relative z-0 w-full mb-6 group">
                    <label for="title" class="label">عنوان الكتاب</label>
                    <input type="text" class="input" disabled name="title" id="title" value="{{ $ReadingChallange->title }}"  placeholder="اكتب العنوان هنا" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="writer_name" class="label">اسم المؤلف</label>
                    <input type="text" class="input" disabled name="writer_name" value="{{ $ReadingChallange->writer_name }}"  placeholder="اكتب اسم المؤلف هنا" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="publishing_house">دار النشر</label>
                    <input type="text" class="input" disabled name="publishing_house" value="{{ $ReadingChallange->publishing_house }}" placeholder="اكتب دار النشر هنا" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="pages">عدد الصفحات</label>
                    <input type="text" class="input" disabled name="pages"  value="{{ $ReadingChallange->pages }}" placeholder="عدد الصفحات" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="summary">ملخص الكتاب</label>
                    <textarea name="summary" class="input" disabled  placeholder="اكتب ملخص الكتاب هنا" cols="30" rows="10">{{ $ReadingChallange->summary }}</textarea>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="complete_date">تاريخ إكمال الكتاب</label>
                    <input type="text" class="input" disabled value="{{ $ReadingChallange->complete_date }}" name="complete_date"  placeholder="اكتب تاريخ إكمال القراءة" />
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="complete_date">  حالة</label>
                    <select name="state" id="">
                        <option @if ($ReadingChallange->state == 1)
                            selected
                        @endif value="1">معتمد</option>
                        <option @if ($ReadingChallange->state == 2)
                            selected
                        @endif  value="2">غير معتمد</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <button type="submit" class="submit">تعديل البيانات</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row"><br/></div>
</div>

@include('admin.footer')
