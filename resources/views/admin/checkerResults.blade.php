@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
            <h1 class="text-2xl font-black">نتائج الطلاب</h1>
        </div>
        <div class="tab_cover my-8">
            <ul class="tab_ul">
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/readingSubmits') }}" class="unselected_tab">الوارد</a>
                </li>                
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/checkerResults') }}" class="selected_tab">النتائج</a>
                </li>
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/postedChecker') }}" class="unselected_tab">المحفوظات</a>
                </li>                
            </ul>
        </div>
</div>

@include('admin.footer')