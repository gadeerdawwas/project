@include('admin.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
                <h1 class="text-2xl my-8">تسجيلات الطلاب</h1>
                <a href="{{ URL::to('/admin/approvedPodcasts') }}" class="submit">تمت الموافقة عليها</a>
        </div>
        <div class="mt-5">
            <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
                <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">#</th>
                            <th scope="col" class="px-6 py-3">اسم الطالب</th>
                            <th scope="col" class="px-6 py-3">الكتاب</th>
                            <th scope="col" class="px-6 py-3">بودكاست</th>
                            <th scope="col" class="px-6 py-3">الموافقة</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($podcasts as $podcast)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row">{{$podcast->podcast_id}}</th>
                                <td class="px-6 py-2">{{$podcast->student_name}}</td>
                                <td class="px-6 py-2">{{$podcast->book_name}}</td>
                                <td class="px-6 py-2"><audio src='{{ url("/file/audioFile/$podcast->file_name") }}'  controls='on' /> </td>
                                <td class="px-6 py-2"><a href="javascript:accept({{$podcast->podcast_id}});" >موافقة</a> - <a href="javascript:reject({{$podcast->podcast_id}});">رفض</a></td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script>
    function accept(id){
        var xhr = new XMLHttpRequest();
            xhr.onload = function(e) {
                if (this.readyState === 4) {
                    console.log("Server returned: ", e.target.responseText);
                    location.reload();
                }
            };
            var fd = new FormData();
            fd.append('_token' , '{{ csrf_token() }}');
            fd.append('approved' , 1);
            fd.append('podcast_id' , id);
            xhr.open("POST", "{{ URL::to('/admin/changePodcastStatus') }}", true);
            xhr.send(fd);
    }

    function reject(id){
        var xhr = new XMLHttpRequest();
            xhr.onload = function(e) {
                if (this.readyState === 4) {
                    console.log("Server returned: ", e.target.responseText);
                    location.reload();
                }
            };
            var fd = new FormData();
            fd.append('_token' , '{{ csrf_token() }}');
            fd.append('approved' , 2);
            fd.append('podcast_id' , id);
            xhr.open("POST", "{{ URL::to('/admin/changePodcastStatus') }}", true);
            xhr.send(fd);
    }
</script>

@include('admin.footer')
