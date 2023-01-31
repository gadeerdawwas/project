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

<body class="bg-white min-h-screen">

  <nav class="p-5 pt-5 h-2 bg-white md:shadow md:flex md:items-center md:justify-between">
    <div class="flex justify-between items-center ">
        <a href="{{ URL::to('/') }}">
            <span class="md:text-2xl sm:text-3xl font-[Cairo] cursor-pointer">
                <img class="h-10 inline" src="{{asset('assets/images/site-logo.svg')}}">
                المكتبات الإلكترونية
            </span>
        </a>
      <span class="text-3xl cursor-pointer mx-2 md:hidden block">
        <ion-icon name="menu" onclick="Menu(this)"></ion-icon>
      </span>
    </div>

    <ul class="md:flex md:items-center z-[10] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 opacity-100 sm:opacity-0 md:opacity-100 top-[-400px] transition-all ease-in duration-500">
      {{-- <li class="mx-4 my-6 md:my-0">
        <a href="{{ URL::to('/') }}" class="text-xl hover:text-cyan-500 duration-500">الرئيسية</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-cyan-500 duration-500">الخدمات</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-cyan-500 duration-500">من نحن</a>
      </li>
      <li class="mx-4 my-6 md:my-0">
        <a href="#" class="text-xl hover:text-cyan-500 duration-500">اتصل بنا</a>
      </li> --}}
      {{-- <li class="mx-4 my-6 md:my-0">
        <a href="{{ URL::to('/register') }}" class="text-xl hover:text-cyan-500 duration-500">التسجيل</a>
      </li> --}}

      <!-- <button class="bg-cyan-400 text-white font-[cairo] duration-500 px-6 py-2 mx-4 hover:bg-cyan-500 rounded-full"> -->
        <a href="{{ URL::to('/school') }}" class="bg-cyan-400 text-white font-[cairo] duration-500 px-6 py-2 mx-4 hover:bg-cyan-500 rounded-full">
        الدخول
        </a>
      <!-- </button> -->
      <h2 class=""></h2>
    </ul>
  </nav>
