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
                                <h4 class="card-title mb-0 flex-grow-1">?????????? ????????????  </h4>

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

                                            <form action="{{ route('manager.updatebook',$Books->id) }}"  method="post" enctype="multipart/form-data">
                                                @csrf
                                            <div class="card-body">



                                                <div class="mb-3">
                                                    <label class="form-label" for="project-title-input">?????? ????????  </label>
                                                    <input type="text" class="form-control"name="ISBN" id="ISBN" disabled value="{{ $Books->ISBN }}"  placeholder="978xxxxxxxxxx">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label" for="project-title-input">    ?????????? ????????????     </label>
                                                    <input type="text" class="form-control" name="title" value="{{ $Books->title }}" id="title" class="input" required placeholder="???????? ?????????? ????????????" >
                                                </div>


                                                <div class="mb-3">
                                                    <label for="categories" class="form-label" >??????????</label>
                                                    <select name="categories"  id="categories" class="form-select" data-choices="" data-choices-search-false="" >
                                                        @foreach ($categories as $categorie)
                                                            <option  @if ($Books->category == $categorie->id)
                                                                selected
                                                            @endif value="{{$categorie->id}}">{{$categorie->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>


                                                <div class="mb-3">
                                                    <label for="school_id" class="form-label" >??????????????</label>
                                                    <select name="school_id"  id="school_id" class="form-select" data-choices="" data-choices-search-false="" >
                                                        @foreach ($Schools as $School)
                                                            <option  @if ($Books->school_id == $School->id)
                                                                selected
                                                            @endif value="{{$School->id}}">{{$School->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>


                                                <div class="mb-3">
                                                    <label for="categories" class="form-label" >?????? ????????????</label>
                                                    <select  name="lang"  id="lang" required class="form-select" data-choices="" >
                                                        <option value=""></option>
                                                        <option  @if ($Books->language == "ar")
                                                            selected
                                                        @endif value="ar">????????</option>
                                                        <option  @if ($Books->language == "en")
                                                            selected
                                                        @endif value="en">??????????????</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="project-title-input">  ?????? ????????????   </label>
                                                    <input type="text" class="form-control" value="{{ $Books->author }}"  name="author" id="author" class="input" required placeholder="????????  ?????? ???????????? " >
                                                </div>


                                                <div class="mb-3">
                                                    <label for="categories" class="form-label" > ?????? ?????????????? </label>
                                                    <input type="text" name="page_number" id="page_number"  value="{{ $Books->page_number }}"   class="form-control" required placeholder="????????  ?????? ?????????????? " />
                                                </div>


                                                <div class="mb-3">
                                                    <label for="categories" class="form-label" >  ?????? ?????????? </label>
                                                    <input type="text" name="Publishing_House"  value="{{ $Books->Publishing_House }}"  id="Publishing_House" required class="form-control" placeholder="???????? ?????? ?????????? " />
                                                </div>



                                            <div class="mb-3">
                                                <label for="categories" class="form-label" >   ???????? ????????  </label>
                                                <div class="">
                                                    <input type="radio" name="copy" value="paper"   id="copy">
                                                    <label for="paper">
                                                        ???????? ????????
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <input type="radio" name="copy" value="electronic"     id="copy">
                                                    <label for="electronic">
                                                    ???????? ????????????????????
                                                    </label>
                                                </div>

                                            </div>


                                            <div class="mb-3">
                                                <label for="categories" class="form-label" >   ?????????? ???????????? ?????????? ???????????? </label>
                                                <div class="">
                                                    <input type="radio" name="challenge" value="1"   id="paper">
                                                    <label for="paper">
                                                    ??????????
                                                    </label>
                                                </div>
                                                <div class="">
                                                    <input type="radio" name="challenge" value="0"   id="paper">
                                                    <label for="paper">
                                                    ??????????
                                                    </label>
                                                </div>

                                            </div>

                                            </div>
                                            <!-- end card body -->
                                        </div>
                                        <!-- end card -->


                                        <!-- end card -->
                                        <div class="text-end mb-4">
                                            <button type="submit" class="btn btn-success w-sm">

                                                ??????
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
    <script>
        $(document).ready(function() {

                $('#ISBN').on('change', function() {

                    var ISBN = $(this).val();
                    console.log(ISBN);



                if (ISBN) {
                    $.ajax({
                        url: "{{ URL::to('get_ISBN') }}/" + ISBN,
                        type: "GET",
                        dataType: "json",


                        success: function(data) {
                            console.log(data);
                            console.log(data.length);
                            if (data.length != 0) {
                                console.log('111111111');
                                // console.log(data);

                                jQuery('#author').val(data.author);
                                jQuery('#author').attr("disabled", true);

                                jQuery('#page_number').val(data.page_number);
                                jQuery('#page_number').attr("disabled", true);

                                jQuery('#title').val(data.title);
                                jQuery('#title').attr("disabled", true);

                                jQuery('#Publishing_House').val(data.Publishing_House);
                                jQuery('#Publishing_House').attr("disabled", true);

                                // $("#copy").val(data.copy).change();
                                console.log(data.language);
                                $("#lang").val(data.language).change();
                                console.log(data.category);
                                $("#categories").val(data.category).change();

                            } else {
                                console.log('00000');
                                jQuery('#author').val('');;
                                jQuery('#author').attr("disabled", false);

                                jQuery('#page_number').val('');
                                jQuery('#page_number').attr("disabled", false);

                                jQuery('#title').val('');
                                jQuery('#title').attr("disabled", false);

                                jQuery('#Publishing_House').val('');
                                jQuery('#Publishing_House').attr("disabled", false);

                                // // $("#copy").val(data.copy).change();
                                // console.log(data.language);
                                // $("#lang").val(data.language).change();
                                // console.log(data.category);
                                // $("#categories").val(data.category).change();
                            }

                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });

        $("#ISBN" ).keyup(function() {
      if($('#ISBN').val().length > 13 || $('#ISBN').val().length < 10 ){
          $('#errorMsg').show();
          console.log($('#ISBN').val().length);
      }
      else{
        $('#errorMsg').hide();
        $('#errorMsg').css('display', 'mone');
      }
    });
    </script>
