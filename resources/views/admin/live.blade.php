@include('admin.header')

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-4"> 
        <h1 class="text-3xl">نشر فعالية مباشرة</h1>        
    </div>
    <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">
        <form action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="categories" class="form-label" >رابط فديو بث مباشر يوتيوب</label>
                <input type="text" name="url" class="input" value="{{ $url }}" placeholder="https://www.youtube.com/embed/TJKnZ784bSI" />
            </div>

            <div class="mb-3">
                <label for=""> تفعيل
                    <input type="radio" class="radio" name="active" value="1" {{ ($active == 1) ? 'checked' : '' }} />
                </label>

                <label for=""> إيقاف
                    <input type="radio" class="radio" name="active" value="0" {{ ($active == 0) ? 'checked' : '' }}  />
                </label>
            </div>

            <div class="mb-3">
                <input type="submit" class="submit" value="حفظ"  />
            </div>
        </form>
    </div>
</div>

@include('admin.footer')