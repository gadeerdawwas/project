@include('admin.header')


<!-- Flipbook StyleSheets -->

@if ($books->language == 'ar')
<link href="{{asset('dearflip/dflip/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('dearflip/dflip/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">

<div class="container">
    <div class="row m-3">
        <div class="col-md-12">
            <h1>{{$books->title}}</h1>
        </div>
    </div>
    <div class="block w-auto my-5 mx-8">
        <div class="bg-yellow-400 p-0">

            <div class="_df_book"
             webgl="true"
             backgroundcolor="teal"
             direction="2"
             allControls=""
             hideControls=""
             moreControls="pageMode,startPage,endPage,sound"
             downloadPDFFile='تحميل'
             source="{{ url("/file/serve/$file_name") }}" id="df_manual_book">


        </div>
    </div>
</div>



<!-- jQuery  -->
<script src="{{asset('dearflip/dflip/js/libs/jquery.min.js')}}" type="text/javascript"></script>
<!-- Flipbook main Js file -->
<script src="{{asset('dearflip/dflip/js/dflip.min.js')}}" type="text/javascript"></script>

@else



<!-- <link rel="stylesheet" href="{{ asset('flipBook/css/style.css') }}"> -->

<!-- Flipbook StyleSheets -->
<link href="{{ asset('dearflip/dflip/css/dflip.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('dearflip/dflip/css/themify-icons.min.css') }}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-2">
        <h1 class="text-3xl">{{ $books->title }}</h1>


    </div>
    <div class="block w-auto my-5 mx-8">
        <div class="bg-yellow-400 p-0">

            <!-- more infor about PDF reader here  -->
            <!-- https://dearflip.com/support/ -->
            <div class="_df_book" webgl="true" backgroundcolor="teal" direction="1" allControls="" hideControls=""
                moreControls="pageMode,startPage,endPage,sound" downloadPDFFile='تحميل'
                source="{{ url("/file/serve/$file_name") }}"    id="df_manual_book">

            </div>
        </div>
    </div>







</div>

<script>




 </script>

<!-- jQuery  -->
<script src="{{ asset('dearflip/dflip/js/libs/jquery.min.js') }}" type="text/javascript"></script>
<!-- Flipbook main Js file -->
<script src="{{ asset('dearflip/dflip/js/dflip.min.js') }}" type="text/javascript"></script>


<!-- this is old pdf viewer -->
<!-- <script src="{{ asset('/flipBook/js/three.min.js') }}"></script>
<script src="{{ asset('/flipBook/js/pdf.min.js') }}"></script>
<script src="{{ asset('/flipBook/js/3dflipbook.min.js') }}"></script> -->


<script></script>




{{-- @include('student.footer') --}}




@endif


@include('admin.footer')
