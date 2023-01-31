@include('header')

<section id="form-section" class="form-section">
    <div class="min-h-screen">
        <h2 class="text-center my-9 text-3xl">تسجيل الدخول</h2>

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

        <div class="w-[500px] mx-auto flex items-center justify-center bg-[#fff] rounded-xl p-8">
            <form method="post" action="">
                @csrf
                <div class="flex flex-wrap -mx-3 mb-6">
                    <div class="w-full px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-900 text-xs font-bold mb-2" for="grid-first-name">
                            الايميل /رقم الهوية
                        </label>
                        <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="email" placeholder="email@gmail.com">
                        <p class="text-red-500 text-xs italic hidden">Please fill out this field.</p>
                    </div>
                    <div class="w-full  px-3">
                        <label class="block uppercase tracking-wide text-gray-900 text-xs font-bold mb-2" for="grid-last-name">
                            كلمة المرور
                        </label>
                        <input class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="password" name="password" placeholder="********">
                    </div>
                </div>

                <button type="submit" class="p-2 rounded-lg text-white bg-orange-500 w-full">تسجيل الدخول</button>

                {{-- <div class="mt-4">
                    <a href="{{ URL::to('/register') }}" class="btn btn-primary col-12 rounded-lg">ليس لديك حساب؟ اشترك الان</a>
                </div> --}}

            </form>
            <!--//form-wrapper-->
        </div>
        <!--//lead-form-wrapper-->
    </div>
    <!--//container-->
</section>
<!--//form-section-->

@include('footer')
