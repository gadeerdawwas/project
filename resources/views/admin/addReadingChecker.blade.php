@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
            <h1 class="text-2xl font-black">إضافة محتوى للطلاب</h1>
        </div>
        <div class="tab_cover my-8">
            <ul class="tab_ul">
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/audioToText') }}" class="unselected_tab">الوارد</a>
                </li>                
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/checkerResults') }}" class="unselected_tab">النتائج</a>
                </li>
                <li class="mr-2">
                    <a href="{{ URL::to('/admin/postedChecker') }}" class="selected_tab">المحفوظات</a>
                </li>                
            </ul>
        </div>

        <div class="w-full my-2">        
            @if (strlen($error_message) > 0)
                <div class="alert alert-danger" role="alert">
                    {!! $error_message !!}
                </div>
            @endif

            @if (strlen($message) > 0)
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif        
        </div>

        <div class="form_wrapper">            

            <form action="" method="post">
                @csrf
                <div class="mb-3">
                    <div class="mb-3">
                        <label for="categories" class="form-label" >عنوان المقالة</label>
                        <input type="text" name="title" class="input" placeholder="اكتب العنوان" required />
                    </div>
                    <div class="mb-3">
                        <label for="categories" class="form-label" >عنوان المقالة</label>
                        <textarea name="body" class="input" maxlength="800" placeholder="اكتب محتوى كحد أقصى 800 حرف" cols="30" rows="10" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="submit" value="حفظ"  />
                    </div>
                </div>
            </form>
        </div>
        
    </div>
   
@include('admin.footer')