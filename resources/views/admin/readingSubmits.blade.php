@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-2">
        <h1 class="text-2xl font-black">القراءات المرسلة من الطلاب</h1>
    </div>
    <div class="tab_cover my-8">
        <ul class="tab_ul">
            <li class="mr-2">
                <a href="{{ URL::to('/admin/readingSubmits') }}" class="selected_tab">الوارد</a>
            </li>                
            <li class="mr-2">
                <a href="{{ URL::to('/admin/checkerResults') }}" class="unselected_tab">النتائج</a>
            </li>
            <li class="mr-2">
                <a href="{{ URL::to('/admin/postedChecker') }}" class="unselected_tab">المحفوظات</a>
            </li>                
        </ul>
    </div>

    <div class="w-full mt-8">
        @foreach ($submits as $submit) 
            <div class="rounded-md shadow-md border-[#e2c233] my-3 border-2 p-4">
                <a href="{{ URL::to('/admin/audioToText?id='.$submit->id ) }}">تم الارسال في {{ $submit->created_at }}</a>
            </div>
        @endforeach
    </div>

</div>

@include('admin.footer')