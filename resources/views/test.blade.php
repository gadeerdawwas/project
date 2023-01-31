<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>المكتبات الالكترونية</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <!-- <script src="https://cdn.tailwindcss.com"></script> -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</head>

<body class="bg-white">  



  <nav class="p-5 pt-5 h-2 bg-white md:shadow md:flex md:items-center md:justify-between">
    <div class="flex justify-between items-center ">
      <span class="md:text-2xl sm:text-3xl font-[Cairo] cursor-pointer">
        <img class="h-10 inline" src="{{asset('assets/images/site-logo.svg')}}">
        المكتبات الإلكترونية
      </span>

      <span class="text-3xl cursor-pointer mx-2 md:hidden block">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>

    <ul class="md:flex md:items-center z-[10] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 opacity-100 sm:opacity-0 md:opacity-100 top-[-400px] transition-all ease-in duration-500">
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-cyan-500 duration-500">الرئيسية</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-cyan-500 duration-500">الخدمات</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-cyan-500 duration-500">من نحن</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-cyan-500 duration-500">اتصل بنا</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-cyan-500 duration-500">التسجيل</a>
      </li>

      <button class="bg-cyan-400 text-white font-[cairo] duration-500 px-6 py-2 mx-4 hover:bg-cyan-500 rounded-full">
        الدخول
      </button>
      <h2 class=""></h2>
    </ul>
  </nav>    

  <div class="h-[600px] bg-black dark:bg-black mt-[0px] opacity-[0.95] p-0 w-full mb-[0px] relative justify-center">
    <video autoplay loop muted plays-inline class="absolute object-cover opacity-50 right-0 left-0 top-auto -z-10 w-full h-full">
      <source src="intro2.mp4" type="video/mp4" />
    </video>
    <!-- <img src="{{asset('assets/images/hero.jpeg')}}" alt=""> -->
    <h1 class="absolute top-[50%] self-center right-[40%] text-white p-0 text-center text-[45px]">المكتبات الذكية</h1>
  </div>

  <h2 class="text-center items-center my-10 mx-auto text-3xl text-slate-900">تعرف إلينا</h2>

  <figure class="m-auto w-80 md:w-1/2 lg:w-1/2 md:h-80 sm:h-60 self-center md:flex shadow-gray-300 shadow-xl bg-yellow-300 rounded-xl  sm:p-0 md:p-0">
    <div class="pt-1 p-8 md:p-3 text-right md:text-justify space-y-4">
      <blockquote>
        <h2 class="text-2xl font-medium mb-6 mt-2">من نحن</h2>
        <!-- <p class="text-l font-medium">هو موقع متخصص في المكتبة الرقمية بشكل خاص فقط للمستخدمين الذين تضيفهم داخل حسابك, انشر الكتب القيمة والأكثر أهمية بشكل خاص لمجموعتك</p> -->
        <p class="text-l font-medium">
منصة الكترونية تهدف لإحياء وتفعيل القراءة ومساعدة المدارس لتشجيع طلابهم على القراءة والاستفادة من محتويات الكتب
وفق بيئة آمنة تشرف عليها إدارة المدرسة والطاقم التربوي.
كمان تتيح عدد من الادوات لمساعدة المشرفين على قياس الاداء لطلابهم والتفاعل معهم</p>
      </blockquote>
    </div>
    <img class="w-36 hidden md:block h-24 md:w-1/2 md:h-auto md:rounded-r-none md:rounded-l-xl mx-auto" src="{{ asset('assets/images/cover-book.jpg') }}" alt="" width="384" height="512">
  </figure>


  <h2 class="text-center items-center my-10 mt-24 mx-auto text-3xl text-slate-900">لماذا نحن؟</h2>

  <!-- services -->
  <div class="m-auto w-full md:w-2/3 bg-white p-0 rounded-lg h-auto md:flex">

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">
      <ion-icon name="book-outline" class="text-6xl"></ion-icon>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          قراءة الكتب
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          تتيح لك المنصة تصفح الكتب التابعة لمدرستك
        </div>
      </figcaption>
    </div>

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">    
      <ion-icon name="radio-outline" class="text-6xl"></ion-icon>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          إنشاء بودكاست
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          يستطيع الطلاب القيام برفع بودكاست كملخص لقراءتهم للكتب
        </div>
      </figcaption>
    </div>

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">
      <ion-icon name="reader-outline" class="text-6xl"></ion-icon>      
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          تحدي القراءة
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          بإمكان الطلاب إنشاء جوازات لتحدي القراءة العربي وتنظيمها من طرف المشرفين بشكل آلي
        </div>
      </figcaption>
    </div>

  </div>

  <!--<div class="m-auto w-full md:w-2/3 bg-white p-0 rounded-lg h-auto md:flex">

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">
      <ion-icon name="play-outline" class="text-6xl"></ion-icon>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          فعاليات مباشرة
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          إنشاء محاضرات وفعاليات تبث مباشرة بالموقع للطلاب
        </div>
      </figcaption>
    </div>

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">    
      <ion-icon name="sparkles-outline" class="text-6xl"></ion-icon>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          تنمية مهارة الطباعة 
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          تم إنشاء طريقة تفاعلية تشجع الطلاب لتحسين سرعة طباعتهم على الحاسوب
        </div>
      </figcaption>
    </div>

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">
      <ion-icon name="chatbubble-ellipses" class="text-6xl"></ion-icon>      
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          استيعاب القراءة
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          قياس مدى استيعاب الطلاب للقراءة
        </div>
      </figcaption>
    </div>

  </div>

  <div class="m-auto w-full md:w-2/3 bg-white p-0 rounded-lg h-auto md:flex">

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">
      <ion-icon name="cloud-upload" class="text-6xl"></ion-icon>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          حفظ الكتب الالكترونية
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          نتيح لك إنشاء مكتبة الكترونية لطلابك فقط بطريقة آمنة
        </div>
      </figcaption>
    </div>

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">    
      <ion-icon name="podium" class="text-6xl"></ion-icon>
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          إحصائيات لحركة الاستخدام
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          حتى تبقى على إطلاع بمدى تفاعل الطلاب وتفضيلاتهم
        </div>
      </figcaption>
    </div>

    <div class="text-center rounded-md my-2 md:my-0 sm:mx-1 sm:w-full p-5 bg-gray-100 shadow-md justify-around items-start">
      <ion-icon name="notifications" class="text-6xl"></ion-icon>      
      <figcaption class="font-medium">
        <div class="text-sky-500 dark:text-sky-400">
          إرسال التنبيهات الجماعية
        </div>
        <div class="text-slate-700 dark:text-slate-500 text-xs">
          تتيح لك المنصة إرسال التنبيهات الجماعية لأولياء الامور دون الحاجة لمنصة أخرى
        </div>
      </figcaption>
    </div>

  </div>-->

  <h2 class="text-center items-center my-10 mt-24 mx-auto text-3xl text-slate-900">آراء المستخدمين</h2>

  <div class="md:flex justify-between items-stretch md:w-2/3 sm:w-full my-10 mx-auto">

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

  </div>

  <h2 class="text-center items-center my-10 mt-24 mx-auto text-3xl text-slate-900">أرسل ملاحظاتك و استفساراتك</h2>

  <div class="w-full md:w-2/5 md:flex items-stretch mx-auto my-10">
    <!-- component -->
    <form class="w-full max-w-lg">
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            اسمك الاول
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" name="f_name" placeholder="أحمد">
          <p class="text-red-500 text-xs italic hidden">Please fill out this field.</p>
        </div>
        <div class="w-full md:w-1/2 px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
            اسمك الاخير
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="text" name="f_name" placeholder="محمد">
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            البريد الالكتروني
          </label>
          <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email" placeholder="example@gmail.com" />
          <p class="text-gray-600 text-xs italic hidden">Some tips - as long as needed</p>
        </div>
      </div>
      <div class="flex flex-wrap -mx-3 mb-6">
        <div class="w-full px-3">
          <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            رسالتك
          </label>
          <textarea name="message" placeholder="اكتب رسالتك" class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>
          <p class="text-gray-600 text-xs italic hidden">Re-size can be disabled by set by resize-none / resize-y / resize-x / resize</p>
        </div>
      </div>
      <div class="md:flex md:items-center">
        <div class="md:w-1/3">
          <button class="shadow bg-teal-400 duration-500 mx-4 hover:bg-cyan-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded-full" type="button">
            أرسل
          </button>
        </div>
        <div class="md:w-2/3"></div>
      </div>
    </form>
  </div>

  <div class="footer bg-black text-white text-sm items-center text-center py-8">
      <ul class="md:flex md:items-center w-1/3 text-xs mx-auto mb-9 justify-between">
        <li><a href="#">سياسة الخصوصية</a></li>
        <li><a href="#">الشروط والاحكام</a></li>
        <li><a href="#">اتصل بنا</a></li>
        <li><a href="#">الشكاوى</a></li>
      </ul>
      <p class="text-sm text-slate-400"> &reg;&trade; {{date('Y')}} جميع الحقوق محفوظة</p>
  </div>

  <script>
    function Menu(e) {
      let list = document.querySelector('ul');
      e.name === 'menu' ? (e.name = "close", list.classList.add('top-[80px]'), list.classList.add('opacity-100')) : (e.name = "menu", list.classList.remove('top-[80px]'), list.classList.remove('opacity-100'))
    }
  </script>


</body>

</html>