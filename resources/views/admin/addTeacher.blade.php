@include('admin.header')

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
    <div class="mb-3">
        <h1 class="text-2xl">أضف معلم جديد</h1>        
    </div>
    <div class="w-[500px] h-auto pb-8">
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">            
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">                                           
                    <label for="id_number" class="form-label" >اسم المعلم</label>
                    <input type="text" name="name" class="input" id="name" placeholder="اكتب اسم المعلم الكامل" />                                        
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label" >البريد الالكتروني</label>
                    <input type="email" id="email" name="email" class="input" placeholder="example@gmail.com" />
                </div>                 
                <div class="mb-3">
                    <label for="password" class="form-label" >كلمة المرور</label>
                    <input type="text" id="password" name="password" class="input" placeholder="اكتب كلمة المرور " value="abc123" />
                </div>               
                <div class="mb-3">
                    <input type="submit" class="submit" value="إضافة الطالب"  />
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.footer')