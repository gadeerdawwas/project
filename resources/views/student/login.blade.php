@include('header')


<section id="form-section" class="form-section">
    <div class="container w-[500px]">
        <div class="lead-form-wrapper single-col-max mx-auto theme-bg-light rounded p-5">
            <h2 class="form-heading text-center">تسجيل الدخول إلى المكتبة</h2>
            <div class="form-intro text-center mb-3"></div>
            <div class="form-wrapper mx-auto">
                
            <div class="w-[500px] mx-auto items-center flex justify-center">
                @if (strlen($error_message) > 0)
                <div class="danger w-full" role="alert">
                    {!! $error_message !!}
                </div>
                @endif

                @if (strlen($message) > 0)
                <div class="success" role="alert">
                    {{ $message }}
                </div>
                @endif
            </div>
                
                
                <form method="post" action="">
                    @csrf  
                    <div class="mb-3">                        
                        <img src='{{ url("/file/show_profile/$school->school_avater") }}' class="h-auto w-25 rounded mx-auto d-block" alt="">
                        <h3 class="text-center">{{ $school->name }}</h3>
                    </div>                  
                    <div class="mb-3">
                        <label for="email" class="form-label">الايميل او رقم الهوية</label>
                        <input type="text" name="email" class="form-control" id="email" value="{{old('email')}}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">ادخل الايميل أو رقم الهوية الخاص بك</div>
                    </div>                                        
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1" aria-describedby="tosHelp">
                        <label class="form-check-label" name="acceptTOS" for="exampleCheck1">أوافق على الشروط والاحكام</label>
                        <div id="tosHelp" class="form-text"><span style="color:red;">*</span> <a href="{{ URL::to('/tos') }}" target="_blank"> الشروط والاحكام</a></div>
                    </div> -->
                    <button type="submit" class="p-2 rounded-lg text-white bg-orange-500 w-full">تسجيل الدخول</button>
                </form>                
                <!--//signup-form-->
            </div>
            <!--//form-wrapper-->
        </div>
        <!--//lead-form-wrapper-->
    </div>
    <!--//container-->
</section>
<!--//form-section-->

@include('footer')