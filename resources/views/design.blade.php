<!DOCTYPE html>
<html lang="en" dir="rtl" class="bg-white">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>المكتبات الالكترونية</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('js/app.css') }}">
</head>

<body class="bg-white">
    
    <header class="h-12 text-lg bg-white text-gray-600 py-11 w-full flex justify-around items-center">
        <div class="py-5 flex justify-items-center justify-center items-center">
            <a class="py-2 px-2" href="{{ URL::to('/design') }}">
                <img class="" src="{{asset('assets/images/site-logo.svg')}}" alt="logo">
            </a>
            <a class="py-2 px-2" href="{{ URL::to('/design') }}">
                <span class="">المكتبات الإلكترونية </span>
            </a>
        </div>
        <div class="mx-0 hidden md:flex">
            <ul class="md:justify-center md:flex md:items-stretch md:space-x-23">
                <li class="sm:hidden py-4 px-3 text-gray-700"><a href="#">الرئيسية</a></li>
                <li class="sm:hidden py-4 px-3 text-gray-700"><a href="#">المميزات</a></li>
                <li class="sm:hidden py-4 px-3 text-gray-700"><a href="#">من نحن</a></li>
                <li class="sm:hidden py-4 px-3 text-gray-700"><a href="#">اتصل بنا</a></li>
            </ul>
        </div>
        <div class="md:flex hidden justify-between">
            <a href="#" class="py-2 px-2">الدخول</a>
            <a href="#" class="py-2 px-2 bg-yellow-500 text-yellow-900 hover:bg-yellow-400 hover:text-yellow-900 rounded">التسجيل</a>
        </div>
    </header>

    <div class="">
        <img src="{{asset('assets/images/hero.jpeg')}}" alt="">
    </div>

    <figure class="m-auto sm:w-1 md:w-1/2 lg:w-1/2 h-80 self-center md:flex shadow-gray-300 shadow-xl bg-yellow-300 rounded-xl p-8 md:p-0">
        <div class="pt-6 md:p-8 text-right md:text-justify space-y-4">
            <blockquote>
                <h2 class="text-2xl font-medium mb-6 mt-2">من نحن</h2>
                <p class="text-l font-medium">هو موقع متخصص في المكتبة الرقمية بشكل خاص فقط للمستخدمين الذين تضيفهم داخل حسابك, انشر الكتب القيمة والأكثر أهمية بشكل خاص لمجموعتك</p>
            </blockquote>
        </div>
        <img class="w-36 h-24 md:w-1/2 md:h-auto md:rounded-r-none md:rounded-l-xl mx-auto" src="{{ asset('assets/images/cover-book.jpg') }}" alt="" width="384" height="512">
    </figure>

    <h2 class="text-center  items-center my-20 mx-auto text-4xl text-slate-900">آراء المستخدمين</h2>
    
    
    <div class="md:flex justify-between items-stretch md:w-2/3 sm:w-full my-24 mx-auto">   

        <div class="text-center rounded-md md:mx-4 sm:mx-1 sm:w-full p-5 bg-gray-200 shadow-md justify-around items-start">
            <p>منصة جميلة و سهلة استفدت منها كثير</p>
            <figcaption class="font-medium">
                <div class="text-sky-500 dark:text-sky-400">
                    محمد احمد
                </div>
                <div class="text-slate-700 dark:text-slate-500 text-xs">
                    مدير مدرسة البيروني
                </div>
            </figcaption>
        </div>

        <!-- <div class="text-center rounded-md md:mx-4 sm:mx-1 sm:w-full p-5 bg-gray-200 shadow-md justify-around items-start">
            <p>منصة جميلة و سهلة استفدت منها كثير</p>
            <figcaption class="font-medium">
                <div class="text-sky-500 dark:text-sky-400">
                    محمد احمد
                </div>
                <div class="text-slate-700 dark:text-slate-500 text-xs">
                    مدير مدرسة البيروني
                </div>
            </figcaption>
        </div>

        <div class="text-center rounded-md md:mx-4 sm:mx-1 sm:w-full p-5 bg-gray-200 shadow-md justify-around items-start">
            <p>منصة جميلة و سهلة استفدت منها كثير</p>
            <figcaption class="font-medium">
                <div class="text-sky-500 dark:text-sky-400">
                    محمد احمد
                </div>
                <div class="text-slate-700 dark:text-slate-500 text-xs">
                    مدير مدرسة البيروني
                </div>
            </figcaption>
        </div> -->

    </div>


    <div class="footer bg-black text-white text-sm items-center text-center py-8">
        <p>جميع الحقوق محفوظة</p>
    </div>
</body>

</html>