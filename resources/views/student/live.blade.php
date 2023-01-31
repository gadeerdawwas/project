@include('student.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-4">        
        <h1 class="text-2xl font-bold">فعاليات مباشرة</h1>
    </div>
    <div class="w-full h-96">
        <div class="p-10">  
            @if($url == '')
                <h3>لا توجد فعاليات</h3>
            @else 
            <iframe class="live w-full" height="450" src="{{ $url }}"></iframe>
            @endif
        </div>
    </div>
</div>


@include('student.footer')