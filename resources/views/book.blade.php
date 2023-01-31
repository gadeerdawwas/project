<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->

    <!-- Flipbook StyleSheets -->
    <link href="{{asset('dearflip/dflip/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('dearflip/dflip/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">

    <title>Document</title>
</head>
<body>
    <h1>book</h1>
    
    <!-- pdf library -->
    <!-- https://dearflip.com/ -->
    <!-- https://github.com/dearhive/dearflip-jquery-flipbook -->
    
    <!-- <div class="_df_book"  webgl="true" backgroundcolor="teal"        
    direction="2"
    allControls=""
    hideControls=""
    moreControls="pageMode,startPage,endPage,sound"
    downloadPDFFile='تحميل'
              source="{{ url("/file/serve/1645803331.pdf") }}"
              id="df_manual_book">
    </div> -->

    
    
    <!-- jQuery  -->
    <!-- <script src="{{asset('dearflip/dflip/js/libs/jquery.min.js')}}" type="text/javascript"></script> -->
    <!-- Flipbook main Js file -->
    <!-- <script src="{{asset('dearflip/dflip/js/dflip.min.js')}}" type="text/javascript"></script> -->

    <div id="book" style="height: 500px; width: 500px;"></div>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset('51103eacf3bef7f35f0812db4ea611f7.js')}}"></script>
</body>
</html>