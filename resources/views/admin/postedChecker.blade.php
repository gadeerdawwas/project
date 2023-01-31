@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
            <h1 class="text-2xl font-black">تصحيح القراءة باستخدام الذكاء الاصطناعي</h1>
        </div>
        <div class="tab_cover my-8">
            <ul class="tab_ul">
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/readingSubmits') }}" class="unselected_tab">الوارد</a>
                </li>                
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/checkerResults') }}" class="unselected_tab">النتائج</a>
                </li>
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/postedChecker') }}" class="selected_tab">المحفوظات</a>
                </li>                
            </ul>
        </div>
        
        <div class="w-full my-5">
            <a href="{{ URL::to('/admin/addReadingChecker') }}" class="submit">أضف محتوى</a>
        </div>
        <div class="table_wrapper">
            <table class="table">
                <thead class="table_header">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">العنوان</th>
                        <th scope="col" class="px-6 py-3">المحتوى</th>                        
                        <th scope="col" class="px-6 py-3">حذف</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($checkers as $checker)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" >
                            <th scope="col">{{$checker->id}}</th>
                            <td class="px-6 py-2">{{$checker->title}}</td>
                            <td class="px-6 py-2">{{textSnippet($checker->body , 100)}}</td>
                            <td class="px-6 py-2">
                                <form method="POST" action="{{ route( 'admin.deleteReadingChecker' , $checker->id ) }}">
                                    @csrf
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" class="text-red-600" title='Delete'>حذف</button>
                                </form>                                
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </div>

    <?php 
        function textSnippet($text, $length) {
            $oreginalText = $text;
            $text = strip_tags($text);
            $text = substr($text, 0, $length);
            $text = substr($text, 0, strrpos($text, ' '));
            if(strlen($oreginalText) >= $length) {
                $text = $text."...";
            }            
            return $text;
        }

        
    ?>
@include('admin.footer')