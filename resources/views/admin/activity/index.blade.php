

@include('admin.header')


<!-- Flipbook StyleSheets -->
<link href="{{asset('dearflip/dflip/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('dearflip/dflip/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">

<div class="container m-3">
    <div class="" style="margin: 50px">
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
    <div class="row m-3">
        <div class="col-md-12">

            <h1>

                الأنشطة

            </h1>
            <a class="btn btn-success" href="{{ route('activities.create') }}">أضافة نشاط</a>

        </div>
    </div>
    <div class="block w-auto my-5 mx-8">
        <div class="">

           <div class="row">


            @foreach ($activities as $activity)
            <div class="col-md-4 text-center">
                <a href="{{ route('activities.show',$activity->id) }}">
                    <iframe
                    src="{{ $activity->link }}">
                    </iframe>
                    {{-- {{ $activity->link }} --}}


                    {{-- <video controls="controls" class="video-stream" x-webkit-airplay="allow" data-youtube-id="N9oxmRT2YWw" src="https://www.youtube.com/watch?v=kIEm--jvBoU"></video> --}}

                     <h2>عنوان  :{{ $activity->title }} </h2>
                     <h2>عدد مشاهدات : {{ $activity->show }} </h2>
                     <h2>تاريخ الانشاء  : {{ $activity->created_at->format('Y-m-d') }} </h2>

                     <br>
                    <span>                     <a href="{{ route('activities.activity_edit',$activity->id) }}" class="btn btn-success"> تعديل</a> <a  href="{{ route('activities.activity_delete',$activity->id) }}"  class="btn btn-danger">حذف</a>               </a>
                    </span>
                </a>
                <br>
             <br>
             </div>

            @endforeach
           </div>
        </div>
    </div>
</div>



<!-- jQuery  -->
<script src="{{asset('dearflip/dflip/js/libs/jquery.min.js')}}" type="text/javascript"></script>
<!-- Flipbook main Js file -->
<script src="{{asset('dearflip/dflip/js/dflip.min.js')}}" type="text/javascript"></script>


@include('admin.footer')
