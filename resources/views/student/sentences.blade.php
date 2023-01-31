@include('student.header')

    <div class="w-full bg-white py-10 px-5 h-screen">

        <h1 class="my-3 text-2xl font-bold">القراءة الذكية</h1>
        <p>اختر فقرة من الفقرات أدناه للقراءة بصوتك</p>

        <div class="w-full mt-8">
            @foreach ($sentences as $sentence) 
                <div class="rounded-md shadow-md border-[#e2c233] my-3 border-2 p-4">
                    <a href="{{ URL::to('/student/readingQualityDetails?id='.$sentence->id ) }}">{{ $sentence->title }}</a>
                </div>
            @endforeach
        </div>

        {{ $sentences->links() }}

    </div>

@include('student.footer')