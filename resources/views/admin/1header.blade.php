<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="theme-style" rel="stylesheet" href="{{asset('css/bootstrap/bootstrap.rtl.min.css')}}">
    <script src="{{asset('js/bootstrap/bootstrap.bundle.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{asset('flipBook/js/jquery.min.js')}}"></script>


    <title>لوحة التحكم</title>
</head>
<body>
    <header class="d-print-none">
        <div class="m-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-warning bg-gradient">
                <div class="container-fluid">
                    <a href="{{ URL::to('/admin') }}" class="navbar-brand">المكتبات الالكترونية</a>
                    <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="{{ URL::to('/admin') }}" class="nav-item nav-link active">الكتب</a>
                            <a href="{{ URL::to('/admin/students') }}" class="nav-item nav-link">الطلاب</a>
                            {{-- <a href="{{ URL::to('/admin/evaluation') }}" class="nav-item nav-link">تقيمات الكتب </a> --}}
                            <!-- <a href="{{ URL::to('/admin/teachers') }}" class="nav-item nav-link">المعلمون</a> -->
                            <a href="{{ URL::to('/admin/podcasts') }}" class="nav-item nav-link">بودكاست  <span>قريبا</span></a>
                            <a href="{{ URL::to('/admin/live') }}" class="nav-item nav-link">الفعاليات <span>قريبا</span></a>
                            <a href="{{ URL::to('/admin/readChallange') }}" class="nav-item nav-link">تحدي القراءة</a>
                            <!-- <a href="#" class="nav-item nav-link">الاقسام</a> -->
                            <!-- <a href="#" class="nav-item nav-link">الاعدادات</a> -->
                            <!-- <a href="#" class="nav-item nav-link disabled" tabindex="-1">الاعدادات</a> -->
                        </div>
                        <div class="navbar-nav ms-auto">
                            <a href="{{ URL::to('/admin/logout') }}" class="nav-item nav-link text-white btn btn-danger">تسجيل الخروج</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
