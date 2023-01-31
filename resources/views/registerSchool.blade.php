@include('header')

<section id="form-section" class="form-section">
    <div class="min-h-screen">
        <div class="lead-form-wrapper single-col-max mx-auto theme-bg-light rounded p-5">
            <h2 class="text-blue-800 text-3xl text-center">تسجيل حساب جديد</h2>
            <div class="my-2 text-gray-500 text-lg text-center mb-3">اشترك الان واحصل على جميع المميزات</div>
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

                <form method="post" action="" enctype="multipart/form-data" class="w-[600px] mx-auto bg-[#fae73bcb] rounded-lg p-8">
                @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">اسم المدرسة</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{ old('name') }}" >
                        <div id="nameHelp" class="form-text">الرجاء كتابة الاسم بشكل صحيح</div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">ايميل المدرسة</label>
                        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">ادخل الايميل الرسمي لمدير المدرسة</div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">اسم المدرسة بالانجليزي بدون مسافات</label>
                        <input type="text" name="username" class="form-control" id="username" value="{{ old('username') }}" aria-describedby="usernamelHelp">
                        <div id="usernamelHelp" class="form-text">يتم اسخدام اسم المسخدم للوصول الى مكتبة مدرستك مثال: {{ URL::to('/username') }} </div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">الرقم الوزاري</label>
                        <input type="text" name="ministerialNumber" class="form-control" id="ministerialNumber" value="{{ old('ministerialNumber') }}" aria-describedby="usernamelHelp">                        
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">بنين / بنات</label>
                        <select name="gender" id="gender"  class="form-control" >
                            <option value="1" {{ (old('grade') == 1) ? 'selected' : '' }} >بنين</option>
                            <option value="2" {{ (old('grade') == 2) ? 'selected' : '' }} >بنات</option>
                        </select>                        
                    </div>
                    <div class="mb-3">
                        <label for="grade" class="form-label">المرحلة الدراسية</label>
                        <select name="grade" id="grade"  class="form-control" >
                            <option value="1" {{ (old('grade') == 1) ? 'selected' : '' }}  >روضة</option>
                            <option value="2" {{ (old('grade') == 2) ? 'selected' : '' }}  >إبتدائي</option>
                            <option value="3" {{ (old('grade') == 3) ? 'selected' : '' }}  >متوسط</option>
                            <option value="4" {{ (old('grade') == 4) ? 'selected' : '' }}  >ثانوي</option>
                        </select>                        
                    </div>
                    <div class="mb-3">
                        <label for="student_count" class="form-label">عدد الطلاب</label>
                        <input type="number" name="student_count" class="form-control" id="student_count" value="{{ old('student_count') }}" />                        
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">رقم هاتف المدرسة</label>
                        <input type="tel" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" />                        
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">شعار المدرسة</label>
                        <input type="file" name="file" class="form-control" id="file" value="{{ old('file') }}" />                        
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">كلمة المرور</label>
                        <input type="password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" name="acceptTOS" {{ old('acceptTOS') ? 'checked' : '' }} class="form-check-input" id="exampleCheck1" aria-describedby="tosHelp">
                        <label class="form-check-label"  for="exampleCheck1">أوافق على الشروط والاحكام</label>
                        <div id="tosHelp" class="form-text"><span style="color:red;">*</span> <a href="{{ URL::to('/tos') }}" target="_blank"> الشروط والاحكام</a></div>
                    </div>
                    <button type="submit" class="p-2 rounded-lg text-white bg-orange-500 w-full">اشترك الان</button>
                </form>
                
                <div class="w-[600px] mx-auto">                    
                    <a href="{{ URL::to('/login/school') }}" class="w-full rounded-lg  btn text-blue-500 mt-8">تسجيل  الدخول</a>                    
                </div>
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