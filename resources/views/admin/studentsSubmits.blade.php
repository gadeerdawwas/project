
@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-4">        
        <h1 class="text-3xl">مشاركات الطالب</h1>        
    </div>
    <div class="relative overflow-x-clip shadow-md sm:rounded-lg">            
        <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">#</th>
                    <th scope="col" class="px-6 py-3">تاريخ المشاركة</th>                    
                    <th scope="col" class="px-6 py-3">إجراء</th>
                </tr>
            </thead>
            <tbody>
                @foreach($requests as $request)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row">{{$request->id}}</th>
                        <th scope="row">{{$request->created_at}}</th>
                        <td class="px-6 py-2"><a href="{{URL::to('/admin/submitDetails/'.$request->id.'')}}" target="_blank">مشاهدة</a> / <a href="{{URL::to('/admin/readingBodyToPDF/'.$request->id.'')}}">تحميل</a></td>                        
                    </tr>
                @endforeach
            </tbody>
        </table>            
    </div>     
</div>

@include('admin.footer')