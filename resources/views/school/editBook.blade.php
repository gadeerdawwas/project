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
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">
            <!-- <a href="{{ url('/file/serve/1645132729.pdf') }}">1645061655.pdf</a> -->
            <form action="{{ route('updatebook_school',$book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <div class="mb-3">
                    <div class="drop-zone m-4">
                        <span class="drop-zone__prompt text-gray-500">ارفع الكتاب هنا</span>
                        <input type="file" name="file" class="drop-zone__input" id="file_upload" accept="application/pdf , pdf" />
                    </div>
                </div> --}}

                <div class="mb-3">
                    <label for="categories" class="form-label" >  رقم ردمك </label>
                    <input type="text" disabled name="ISBN" class="input" value="{{ $book->ISBN }}" placeholder="اكتب رقم ردمك " />
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label" >عنوان الكتاب</label>
                    <input type="text" name="title" class="input" value="{{ $book->title }}" placeholder="اكتب عنوان الكتاب" />
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label" >القسم</label>
                    <select class="input" name="categories" id="categories">
                        @foreach ($categories as $categorie)
                            <option  @if ($book->categories == $categorie->id)
                                selected
                            @endif value="{{$categorie->id}}">{{$categorie->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label" >لغة الكتاب</label>
                    <select class="input" name="lang" id="categories">

                        <option value="ar" @if ($book->language == "ar")
                            selected
                        @endif>عربي</option>
                        <option  @if ($book->language == "en")
                            selected
                        @endif value="en">إنجليزي</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="categories" class="form-label" > اسم المؤلف </label>
                    <input type="text" name="author"  value="{{ $book->author }}" class="input" placeholder="اكتب  اسم المؤلف " />
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label" > عدد الصفحات </label>
                    <input type="text" name="page_number" value="{{ $book->page_number }}"  class="input" placeholder="اكتب  عدد الصفحات " />
                </div>



                <div class="mb-3">
                    <label for="categories" class="form-label" >  دار النشر </label>
                    <input type="text" name="Publishing_House"  value="{{ $book->Publishing_House }}" class="input" placeholder="اكتب دار النشر " />
                </div>
                <div class="mb-3">
                    <label for="categories" class="form-label" >   توفر نسخة  </label>
                    <div class="">
                        <input type="radio" name="copy" value="paper"  id="paper">
                        <label for="paper">
                            نسخة ورقي
                        </label>
                    <div class="">
                        <input type="radio" name="copy" value="electronic"  id="electronic">
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
                        <input type="radio" name="challenge" value="1"  id="paper">
                        <label for="paper">
                           تفعيل
                        </label>
                    <div class="">
                        <input type="radio" name="challenge" value="0"  id="paper">
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

@include('school.footer')
