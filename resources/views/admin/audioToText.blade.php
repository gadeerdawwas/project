@include('admin.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
            <h1 class="text-2xl font-black">تصحيح القراءة باستخدام الذكاء الاصطناعي</h1>
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
        <div class="inline-flex overflow-x-clip">
            <audio src="{{ url('/file/audioRecord/'.$submit->file_name) }}" controls='on'></audio>
            <form action="" method="post" class="my-2 mx-8">
            @csrf
                <button class="submit">تصحيح</button>
            </form>
        </div>
        <div class="grid grid-cols-1 lg:grid-col-5 md:grid-cols-4 my-6 gap-4 place-items-stretch h-18">
            <div class="block text-center p-6 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-sm text-gray-600">إجمالي الكلمات المعالجة</p>
                <p class="text-3xl font-bold text-black">{{$submit->total_processed_words}} كلمة</p>
            </div>
            <div class="block text-center p-6 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-sm text-gray-600">إجمالي الكلمات الصحيحة</p>
                <p class="text-3xl font-bold text-black">{{$submit->correct_words}} كلمة</p>
            </div>
            <div class="block text-center p-6 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-sm text-gray-600">نسبة الصحة</p>
                <p class="text-3xl font-bold text-black">                    
                    {{  $submit->percentage }}%
                </p>
            </div>
            <div class="block text-center p-6 max-w-xs bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                <p class="text-sm text-gray-600">زمن المعالجة</p>
                <p class="text-3xl font-bold text-black">{{$submit->total_time_seconds}} ثانية</p>
            </div>
        </div>
        
        <div  class="my-10">
            <h3>النص قبل التصحيح</h3>
        </div>

        <div class="h-56 rounded-md shadow-sm bg-slate-100">
            @if (strlen($submit->sentence) > 0)
                <div class="text-gray-700 p-3" role="alert">
                    {!! $submit->sentence !!}
                </div>
            @endif
        </div> 

        <div  class="my-10">
            <h3>النص بعد التصحيح</h3>
        </div>
        
        <div class="h-56 rounded-md shadow-sm bg-slate-100">
            @if (strlen($submit->processed_text) > 0)
                <div class="text-gray-700 p-3" role="alert">
                    {!! $submit->processed_text !!}
                </div>
            @endif
        </div>        
        
    </div>

@include('admin.footer')