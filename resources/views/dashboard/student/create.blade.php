@extends('dashboard.include.logout')
@push('style')
    <style>
        .delete {
            cursor: pointer !important;
            font-size: 30px;
            position: absolute;
            color: white;
            border: none;
            background: none;
            right: -15px;
            top: -15px;
            line-height: 1;
            z-index: 99;
            padding: 0;
        }

        .delete span {
            height: 30px;
            width: 30px;
            background-color: black;
            border-radius: 50%;
            display: block;
        }

        .box {
            width: calc((100% - 30px) * 0.333);
            margin: 5px;
            height: 250px;
            background: #CCCCCC;
            float: left;
            box-sizing: border-box;
            position: relative;
            box-shadow: 0 0 5px 2px rgba(0, 0, 0, .15);
        }

        .box:hover {
            box-shadow: 0 0 15px 3px rgba(0, 0, 0, 0.5);
        }

        .box .image {
            width: 100%;
            height: 100%;
            position: relative;
            overflow: hidden;
        }

        .box .image img {
            width: 100%;
            min-height: 100%;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            -webkit-transform: translate(-50%, -50%);
        }

        @media (max-width: 600px) {
            .box {
                width: calc((100% - 20px) * 0.5);
                height: 200px;
            }
        }
    </style>
@endpush


@section('content')
    {{-- @if (session()->has('success')) --}}

    {{-- @endif --}}

    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-xxl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">اضافه طالب  </h4>

                            </div><!-- end card header -->

                            <div class="card-body">

                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-borderless" role="alert">
                                        <strong>{{ session()->get('success') }}</strong>
                                    </div>
                                @endif





                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="card">

                                            <form action="{{ route('manager.students.store') }}"  method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="card-body">


                                                @csrf
                                                <div class="mb-3">
                                                    <label for="id_number" class="form-label" >اسم الطالب</label>
                                                    <input type="text" name="name" class="form-control" id="name" placeholder="اكتب اسم الطالب الكامل" />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="id_number" class="form-label" >رقم الهوية</label>
                                                    <input type="text" id="id_number" name="id_number" class="form-control" placeholder="اكتب رقم الهوية" />
                                                </div>

                                                <div class="mb-3">
                                                    <label for="school_id" class="form-label" >المدرسة</label>
                                                    <select name="school_id"  id="school_id" class="form-select" data-choices="" data-choices-search-false="" >
                                                       <option value=""></option>
                                                        @foreach ($Schools as $School)
                                                            <option value="{{$School->id}}">{{$School->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="mb-3">
                                                    <label for="class" class="form-label" >الصف</label>
                                                    <select  name="class" id="class" class="form-control" >
                                                        <option value=""></option>
                                                        @foreach ($classes as $class)
                                                            <option value="{{$class->id}}">{{$class->name}} /  {{ (($class->Classroom) ? $class->Classroom->name : '') }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="mb-3">
                                                    <label for="password" class="form-label" >كلمة المرور</label>
                                                    <input type="text" id="password" name="password" class="form-control" placeholder="اكتب كلمة المرور " value="abc123" />
                                                </div>









                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->


                                        <!-- end card -->
                                        <div class="text-end mb-4">
                                            <button type="submit" class="btn btn-success w-sm">

                                                حفظ
                                            </button>
                                        </div>
                                    </div>
                                    <!-- end col -->
                                </form>

                                        <!-- end card -->


                                        <!-- end card -->
                                    </div>
                                    <!-- end col -->
                                </div>





                            </div>
                        </div>
                    </div>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->


        </div>
    @endsection


    @push('script')

    {{-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- links to popper js and bootsrap js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
        console.log('333333333333333333333333');
        $(document).ready(function() {

            $('select[name="school_id"]').on('change', function() {
            var school_id = $(this).val();
            console.log(school_id);
            if (school_id) {
                console.log(school_id);
                $.ajax({
                    // url: "{{ URL::to('manager/getclass/8') }}/",
                    url: "{{ URL::to('manager/getclass') }}/" + school_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                          $('select[name="class"]').empty();
                        $('select[name="class"]').append('<option value=""></option>');
                        $.each(data, function(key, value) {
                            console.log(key);
                            console.log(value);
                            console.log(value.classroom.name);

                            $('select[name="class"]').append('<option value="' +
                            value.id + '">' + value.name + "  /  " + value.classroom.name+ '</option>');
                        });
                        //   $('select[name="class"]').empty();
                        // $('select[name="class"]').append('<option value=""></option>');
                        // $.each(data[0], function(key, value) {
                        //     $('select[name="class"]').append('<option value="' +
                        //     value + '">' + key / classroom+ '</option>');
                        // });
                    },
                });

            } else {
                console.log('AJAX load did not work');
            }
        });
    });



    </script>
    @endpush

