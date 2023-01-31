@include('student.header')


<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-2">

      <div class="row">
        <div class="col-md-8">
            <h2 class="text-3xl"> عرض تحدياث القراءه
            <strong> 50 / {{ $challenge }} </strong>
            </h2>


        </div>
        <div class="col-md-4">
            {{-- <h4><a href="{{ route('result_reads',['id' => $user_id ,'parameter'=>1]) }}" class="btb "><a href="{{ route('result_reads',['id' => $user_id ,'parameter'=>1]) }}" class="btb ">طباعة</a></a> </h4> --}}
        </div>
      </div>
    </div>


    <div class="row justify-content-md-center bg-danger mt-3 p-6">
        <div class="col-lg-6   ">
            <a href="{{ route('readChallange_group',['id' => 1]) }}" style="color: #000" class="">
                <span>الجواز الأول</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 1]) }}" style="color: #000" class="">
                <span>  10 / {{ $challenge_1_count }} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 1]) }}" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>



        <div class="col col-lg-2">
            @if ($challenge_1_count ==10)

            <a href="{{ route('readChallange_group',['id' => 1]) }}" style="color: #000" class="">
                <span> <a href="{{ route('result_reads',['id' => $user_id ,'parameter'=>1]) }}" class="btb ">طباعة</a></span>
            </a>
            @endif
        </div>
    </div>


    @if ($challenge_2_count >=1)
    <div class="row justify-content-md-center bg-success  mt-3 p-6">
        <div class="col-lg-6   ">
            <a href="{{ route('readChallange_group',['id' => 2]) }}" style="color: #000" class="">
                <span>الجواز التاني</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 2]) }}" style="color: #000" class="">
                <span> 10 / {{ $challenge_2_count}} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 2]) }}" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>
        <div class="col col-lg-2">
            @if ($challenge_2_count ==10)
            <a href="{{ route('readChallange_group',['id' => 2]) }}" style="color: #000" class="">
                <span> <a href="{{ route('result_reads',['id' => $user_id ,'parameter'=>1]) }}" class="btb ">طباعة</a></span>
            </a>
            @endif

        </div>
    </div>

    @else
    <div class="row justify-content-md-center bg-success  mt-3 p-6">
        <div class="col-lg-6   ">
            <a href="#" style="color: #000" class="">
                <span>الجواز التاني</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="#" style="color: #000" class="">
                <span> 10 / {{ $challenge_2_count}} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="#" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>
        <div class="col col-lg-2">

        @if ($challenge_2_count ==10)
        <a href="{{ route('readChallange_group',['id' => 2]) }}" style="color: #000" class="">
            <span> <a href="{{ route('result_reads',['id' => $user_id ,'parameter'=>1]) }}" class="btb ">طباعة</a></span>
        </a>
        @endif
    </div>
    </div>


    @endif




    @if ($challenge_3_count >=1)
    <div class="row justify-content-md-center bg-primary mt-3 p-6">
        <div class="col-lg-6   ">
            <a href="{{ route('readChallange_group',['id' => 3]) }}" style="color: #000" class="">
                <span>الجواز الثالث</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 3]) }}" style="color: #000" class="">
                <span> 10 / {{ $challenge_3_count }} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 3]) }}" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>
        @if ($challenge_3_count ==10)

        <div class="col col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 3]) }}" style="color: #000" class="">
                <span> <a href="{{ route('result_reads',['id' => $user_id ,'parameter'=>1]) }}" class="btb ">طباعة</a></span>
            </a>
        </div>

        @endif
    </div>

    @else
    <div class="row justify-content-md-center bg-primary mt-3 p-6">
        <div class="col-lg-6   ">
            <a href="#" style="color: #000" class="">
                <span>الجواز الثالث</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="#" style="color: #000" class="">
                <span> 10 / {{ $challenge_3_count }} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="#" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>
        <div class="col col-lg-2">
            {{-- <a href="#" style="color: #000" class="">
                <span> <a href="#" class="btb ">طباعة</a></span>
            </a> --}}
        </div>
    </div>

    @endif
    @if ($challenge_4_count >=1)
    <div class="row justify-content-md-center bg-secondary mt-3 p-6">
        <div class="col-lg-6   ">
            <a href="{{ route('readChallange_group',['id' => 4]) }}" style="color: #000" class="">
                <span>الجواز الرابع</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 4]) }}" style="color: #000" class="">
                <span> 10 / {{ $challenge_4_count }} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 4]) }}" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>
        <div class="col col-lg-2">
            @if ($challenge_4_count ==10)

            <a href="{{ route('readChallange_group',['id' => 4]) }}" style="color: #000" class="">
                <span> <a href="{{ route('result_reads',['id' => $user_id ,'parameter'=>1]) }}" class="btb ">طباعة</a></span>
            </a>
            @endif
        </div>
    </div>
    @else
    <div class="row justify-content-md-center bg-secondary mt-3 p-6">
        <div class="col-lg-6   ">
            <a href="#" style="color: #000" class="">
                <span>الجواز الرابع</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="#" style="color: #000" class="">
                <span> 10 / {{ $challenge_4_count }} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="#" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>
        <div class="col col-lg-2">
            {{-- <a href="#" style="color: #000" class="">
                <span> <a href="#" class="btb ">طباعة</a></span>
            </a> --}}
        </div>
    </div>
    @endif


    @if ($challenge_5_count >=1)
    <div class="row justify-content-md-center bg-Gold mt-3 p-6" style="    background: gold;">
        <div class="col-lg-6   ">
            <a href="{{ route('readChallange_group',['id' => 5]) }}" style="color: #000" class="">
                <span>الجواز الخامس</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 5]) }}" style="color: #000" class="">
                <span> 10 / {{ $challenge_5_count}} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="{{ route('readChallange_group',['id' => 5]) }}" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>
        <div class="col col-lg-2">
            @if ($challenge_5_count ==10)

            <a href="{{ route('readChallange_group',['id' => 5]) }}" style="color: #000" class="">
                <span> <a href="{{ route('result_reads',['id' => $user_id ,'parameter'=>1]) }}" class="btb ">طباعة</a></span>
            </a>
            @endif
        </div>
    </div>
    @else
    <div class="row justify-content-md-center bg-Gold mt-3 p-6" style="    background: gold;">
        <div class="col-lg-6   ">
            <a href="#" style="color: #000" class="">
                <span>الجواز الخامس</span>
            </a>
        </div>
        <div class="col-lg-2">
            <a href="#" style="color: #000" class="">
                <span> 10 / {{ $challenge_5_count}} </span>
            </a>
        </div>
        <div class="col col-lg-2">
            <a href="#" style="color: #000" class="">
                <span>مشاهدة </span>
            </a>
        </div>
        <div class="col col-lg-2">
            {{-- <a href="#" style="color: #000" class="">
                <span> <a href="#" class="btb ">طباعة</a></span>
            </a> --}}
        </div>
    </div>
    @endif








    <br>
    <br>
    <br>
    <br>




</div>

@include('student.footer')
