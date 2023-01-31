@include('admin.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">            
            <h1 class="text-2xl my-8">قائمة البودكاست</h1>            
        </div>
        <div class="mt-5">
            <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
                <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead  class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col"  class="px-6 py-3">#</th>
                            <th scope="col"  class="px-6 py-3">اسم الطالب</th>
                            <th scope="col"  class="px-6 py-3">عنوان الكتاب</th>
                            <th scope="col"  class="px-6 py-3">بودكاست</th>                            
                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach ($podcasts as $podcast)
                            <tr>
                                <th scope="row">{{$podcast->podcast_id}}</th>
                                <td class="px-6 py-2">{{$podcast->student_name}}</td>
                                <td class="px-6 py-2">{{$podcast->book_name}}</td>                                
                                <td class="px-6 py-2"><audio src='{{ url("/file/audioFile/$podcast->file_name") }}''  controls='on' /> </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>   
    </div>

@include('admin.footer')