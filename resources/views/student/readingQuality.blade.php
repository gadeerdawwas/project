@include('student.header')

    <div class="w-full bg-white py-10 px-5 h-screen">

        <h1 class="my-3 text-2xl font-bold">جودة القراءة بواسطة الذكاء الاصطناعي</h1>

        <div class="w-full my-2">
            
            @if (strlen($message) > 0)
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif

        </div>

        <div class="rounded-md m-auto bg-blue-200 w-full h-[400px] p-4 mb-3">
            <h3 class="text-xl font-medium my-3">النص المقروء</h3>
            <div class="p-8 rounded-lg bg-yellow-200 pt-6">
                <p class="text-[28px] font-medium">{{ $sentence->body }}</p>
            </div>
            <div class="controls  mt-5 flex w-full">
                <button id="recordButton" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-md text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                        <span class="mx-2" id="recordButtonText">بدء التسجيل</span>
                    </div>
                </button>
                <form action="" method="post">
                    @csrf
                    <button id="stopButton" disabled class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-md text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z" clip-rule="evenodd" />
                            </svg>
                            <span class="mx-2">رفع التسجيل</span>
                        </div>
                    </button>
                </form>
            </div>
        </div>
        
    </div>

    <script>
        var status = 1;
        $('#recordButton').click(function(){
            if(status == 1){
                $('#recordButtonText').html("جاري التسجيل");
                status = 2
            }else if(status == 2){
                $('#recordButtonText').html("إنهاء التسجيل");
                status = 3
            }else{
                $('#stopButton').removeAttr("disabled");
                $('#recordButtonText').html("بدء التسجيل");
                status = 1
            }
            
        });
    </script>

@include('student.footer')