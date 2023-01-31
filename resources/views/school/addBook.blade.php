@include('school.header')

<div class="w-full bg-white py-10 px-5 h-screen">
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
    <div class="w-full h-auto pb-8">
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 ">
            <!-- <a href="{{ url('/file/serve/1645132729.pdf') }}">1645061655.pdf</a> -->
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <div class="drop-zone m-4">
                        <span class="drop-zone__prompt text-gray-500">ارفع الكتاب هنا</span>
                        <input type="file" name="file" class="drop-zone__input"  id="file_upload" accept="application/pdf , pdf" />
                    </div>
                </div>

                <div class="mb-3">
                    {{-- <input id="txtNumber" type="text" message="you can give score -10 to +10 only" minlength="10" maxlength="13" /> --}}

                    <label for="categories" class="form-label" >  رقم ردمك </label>
                    <input type="text"   name="ISBN" id="ISBN"  class="input"   placeholder="978xxxxxxxxxx"  />

                    {{-- <input type="text"   name="ISBN" id="ISBN" class="input"   required placeholder="978xxxxxxxxxx" minlength="10" maxlength="13" />

                    <span id="errorMsg" style="display:none;">الرقم يجب ان يكون مكون من 10 - 13 خانة</span> --}}
                </div>


                <div class="mb-3">
                    <label for="cat egories" class="form-label" >عنوان الكتاب</label>
                    <input type="text" name="title" id="title" class="input" required placeholder="اكتب عنوان الكتاب" />
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label" >القسم</label>
                    <select class="input" name="categories"  id="categories">
                        @foreach ($categories as $categorie)
                            <option value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label" >لغة الكتاب</label>
                    <select class="input" name="lang"  id="lang" required>
                        <option value="ar">عربي</option>
                        <option value="en">إنجليزي</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label" > اسم المؤلف </label>
                    <input type="text" name="author" id="author" class="input" required placeholder="اكتب  اسم المؤلف " />
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label" > عدد الصفحات </label>
                    <input type="text" name="page_number" id="page_number" class="input" required placeholder="اكتب  عدد الصفحات " />
                </div>


                <div class="mb-3">
                    <label for="categories" class="form-label" >  دار النشر </label>
                    <input type="text" name="Publishing_House" id="Publishing_House" required class="input" placeholder="اكتب دار النشر " />
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label" >   توفر نسخة  </label>
                    <div class="">
                        <input type="radio" name="copy" value="paper"    id="copy">
                        <label for="paper">
                            نسخة ورقي
                        </label>
                    <div class="">
                        <input type="radio" name="copy" value="electronic"     id="copy">
                        <label for="electronic">
                          كتاب الالكترونى
                        </label>
                    </div>

                </div>
                <br>
                <br>
                <div class="mb-3">
                    <label for="categories" class="form-label" >   اضافة الكتاب لتحدى القراء </label>
                    <div class="">
                        <input type="radio" name="challenge" value="1"   id="paper">
                        <label for="paper">
                           تفعيل
                        </label>
                    <div class="">
                        <input type="radio" name="challenge" value="0"   id="paper">
                        <label for="paper">
                          تعطيل
                        </label>
                    </div>

                </div>



                <div class="mb-3">
                    <input type="submit" class="submit" value="رفع الملف"  />
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

            $('#ISBN').on('change', function() {

                var ISBN = $(this).val();
                console.log(ISBN);



            if (ISBN) {
                $.ajax({
                    url: "{{ URL::to('get_ISBN') }}/" + ISBN,
                    type: "GET",
                    dataType: "json",


                    success: function(data) {
                        console.log(data);
                        console.log(data.length);
                        if (data.length != 0) {
                            console.log('111111111');
                            // console.log(data);

                            jQuery('#author').val(data.author);
                            jQuery('#author').attr("disabled", true);

                            jQuery('#page_number').val(data.page_number);
                            jQuery('#page_number').attr("disabled", true);

                            jQuery('#title').val(data.title);
                            jQuery('#title').attr("disabled", true);

                            jQuery('#Publishing_House').val(data.Publishing_House);
                            jQuery('#Publishing_House').attr("disabled", true);

                            // $("#copy").val(data.copy).change();
                            console.log(data.language);
                            $("#lang").val(data.language).change();
                            console.log(data.category);
                            $("#categories").val(data.category).change();

                        } else {
                            console.log('00000');
                            jQuery('#author').val('');;
                            jQuery('#author').attr("disabled", false);

                            jQuery('#page_number').val('');
                            jQuery('#page_number').attr("disabled", false);

                            jQuery('#title').val('');
                            jQuery('#title').attr("disabled", false);

                            jQuery('#Publishing_House').val('');
                            jQuery('#Publishing_House').attr("disabled", false);

                            // // $("#copy").val(data.copy).change();
                            // console.log(data.language);
                            // $("#lang").val(data.language).change();
                            // console.log(data.category);
                            // $("#categories").val(data.category).change();
                        }

                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });

    $("#ISBN" ).keyup(function() {
  if($('#ISBN').val().length > 13 || $('#ISBN').val().length < 10 ){
      $('#errorMsg').show();
      console.log($('#ISBN').val().length);
  }
  else{
    $('#errorMsg').hide();
    $('#errorMsg').css('display', 'mone');
  }
});
</script>



@include('school.footer')
