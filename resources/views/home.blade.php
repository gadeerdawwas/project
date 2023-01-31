@include('header')

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

  <div class="w-full md:w-1/2 items-center md:flex self-center flex mx-auto my-10">
    <!-- component -->
    <form class="w-full">
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

  @include('footer')