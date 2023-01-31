

@include('student.header')


<!-- Flipbook StyleSheets -->
<link href="{{asset('dearflip/dflip/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('dearflip/dflip/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">

<div class="container">
    <div class="row m-3">
        <div class="col-md-12">

            <h1>

                الأنشطة


            </h1>
        </div>
    </div>
    <div class="block w-auto my-5 mx-8">
        <div class="">

           <div class="row">

            <div class="col-md-10 text-center">
                <iframe width="100%" height="400"
                src="{{ $activity->link }}">
                </iframe>
                 <h2>عنوان  :{{ $activity->title }} </h2>
                 <h2>عدد مشاهدات : {{ $activity->show }} </h2>
                 <h2>تاريخ الانشاء  : {{ $activity->created_at->format('Y-m-d') }} </h2>
                 <br>

             <br>
             <br>
             </div>

           </div>
        </div>
    </div>
</div>



<!-- jQuery  -->
<script src="{{asset('dearflip/dflip/js/libs/jquery.min.js')}}" type="text/javascript"></script>
<!-- Flipbook main Js file -->
<script src="{{asset('dearflip/dflip/js/dflip.min.js')}}" type="text/javascript"></script>


@include('student.footer')
