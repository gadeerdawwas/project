@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full">
        <h1 class="mt-4 mb-8 text-2xl">مسابقة تحدي القراءة العربي</h1>
    </div>

    <div class="w-auto mx-20">
        <div class="p-5 bg-yellow-200 rounded-xl">

            <form action="#" method="post">
                @csrf
                <div class="relative z-0 w-full mb-6 group">
                    <label for="title" class="label">عنوان الكتاب :  </label>
                    <label for="complete_date">  {{ $ReadingChallange->title }}</label>

                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="writer_name" class="label">اسم المؤلف :  </label>
                    <label for="complete_date">  {{ $ReadingChallange->writer_name }}</label>

                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="publishing_house">دار النشر :  </label>
                    <label for="complete_date">  {{ $ReadingChallange->publishing_house }}</label>

                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="pages">عدد الصفحات  :  </label>
                    <label for="complete_date">  {{ $ReadingChallange->pages }}</label>

                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="summary">ملخص الكتاب :  </label>
                    <label for="complete_date">  {{ $ReadingChallange->summary }}</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="complete_date">تاريخ إكمال الكتاب :  </label>
                    <label for="complete_date">  {{ $ReadingChallange->complete_date }}</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <label for="complete_date">  حالة</label>
                     @if ($ReadingChallange->state == 2)
                        <span class="" style="color: red">غير معتمد</span>
                     @elseif ($ReadingChallange->state == 1)
                        <span class="" style="color: green"> معتمد</span>
                    @else
                    <span style="color: blue"> قيد الانتظار</span>

                    @endif
                </div>
                {{-- <div class="relative z-0 w-full mb-6 group">
                    <button type="submit" class="submit">أرسل البيانات</button>
                </div> --}}
            </form>
        </div>
    </div>
    <div class="row"><br/></div>
</div>

@include('admin.footer')
