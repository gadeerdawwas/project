@include('teacher.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <h1 class="text-2xl font-bold mb-4">احجز الان</h1>
        <div class="my-0">
            <div class="w-[500px] h-auto pb-0">
                @if (strlen($message) > 0)
                    <div class="success my-3" role="alert">
                        {!! $message !!}
                    </div>                   
                @endif
                
                @if (strlen($error_message) > 0)
                    <div class="danger my-3" role="alert">
                        {!! $error_message !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="w-[500px] h-auto pb-8">
            <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <h2 class="text-3xl font-bold">تفاصيل حجزك هي</h2>
                    <h3 class="mt-3 font-bold text-xl">التاريخ: <strong>{{ $_SESSION['date'] }}</strong></h3>
                    <h3 class="mt-3 font-bold text-xl">رقم الحصة: <strong>{{ $_SESSION['slot'] }}</strong></h3>
                    <div class="mb-3">                        
                        <input type="hidden" name="date" value="{{ $_SESSION['date'] }}" />
                        <input type="hidden" name="slot" value="{{ $_SESSION['slot'] }}" />
                    </div>                    
                    <div class="mb-3">
                        @if (strlen($message) == 0)
                            <input type="submit" class="submit" value="تأكيد الحجز" />
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (strlen($message) > 0)       
        @php
            unset($_SESSION['date']);
            unset($_SESSION['slot']);
        @endphp
    @endif

@include('teacher.footer')