<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>تفاصيل المشاركة</title>
</head>
<body class="bg-black">
    <!-- this is helpfull link  -->
    <!-- https://cloudconvert.com/pdf-to-png -->
    <a href="javascript:print();" class="print:hidden p-4 bg-blue-600 text-white text-2xl text-center">طباعة</a>
    <div class="bg-white w-[210mm] h-[297mm] mx-auto relative">
        <img src="{{ asset('pdf/body.png') }}" alt="">
        <p class="absolute top-[110px] right-[280px] text-[24px] font-semibold">{{ $details->title }}</p>
        <p class="absolute top-[200px] right-[280px] text-[24px] font-semibold">{{ $details->writer_name }}</p>
        <p class="absolute top-[285px] right-[220px] text-[24px] font-semibold">{{ $details->publishing_house }}</p>
        <p class="absolute top-[370px] right-[300px] text-[24px] font-semibold">{{ $details->pages }}</p>
        <p class="absolute top-[503px] right-[80px] text-[24px] font-semibold leading-[2.1] text-justify pl-4">{{ $details->summary }}</p>
        <p class="absolute bottom-[80px] right-[400px] text-[24px] font-semibold">{{ $details->complete_date }}</p>
    </div>
</body>
</html>