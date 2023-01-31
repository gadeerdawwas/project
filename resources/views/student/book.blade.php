


@include('student.header')


<!-- Flipbook StyleSheets -->

@if ($books->language == 'ar')
<link href="{{asset('dearflip/dflip/css/dflip.min.css')}}" rel="stylesheet" type="text/css">
<link href="{{asset('dearflip/dflip/css/themify-icons.min.css')}}" rel="stylesheet" type="text/css">


<style>
    /* Media Queries */

    /* Small Devices*/

    @media (min-width: 0px) {
        /* {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background-color: lightcyan;
            color: #414142;
            position: relative;
            font-family: monospace;
        }*/

        /*.title {
            font-size: 30px;
            margin-bottom: 55px;
            text-align: center;
        }

        .audio-recording-container {
            width: 100%;
            height: 100vh;
            /* view port height*/
        /*targeting Chrome & Safari*/
        display: -webkit-flex;
        /*targeting IE10*/
        display: -ms-flex;
        display: flex;
        /* flex-direction: column; */
        justify-content: center;
        /*horizontal centering*/
        align-items: center;
    }

    .start-recording-button {
        font-size: 70px;
        color: #435f7a;
        cursor: pointer;
        opacity: .5;
        margin-bottom: 30px;
    }

    .start-recording-button:hover {
        opacity: 1;
    }

    .recording-contorl-buttons-container {
        /*targeting Chrome & Safari*/
        display: -webkit-flex;
        /*targeting IE10*/
        display: -ms-flex;
        display: flex;
        justify-content: space-evenly;
        /*horizontal centering*/
        align-items: center;
        width: 334px;
        margin-bottom: 30px;
    }

    .cancel-recording-button,
    .stop-recording-button {
        font-size: 70px;
        cursor: pointer;
    }

    .cancel-recording-button {
        color: red;
        opacity: 0.7;
    }

    .cancel-recording-button:hover {
        color: rgb(206, 4, 4);
    }

    .stop-recording-button {
        color: #33cc33;
        opacity: 0.7;
    }

    .stop-recording-button:hover {
        color: #27a527;
    }

    .recording-elapsed-time {
        /*targeting Chrome & Safari*/
        display: -webkit-flex;
        /*targeting IE10*/
        display: -ms-flex;
        display: flex;
        justify-content: center;
        /*horizontal centering*/
        align-items: center;
    }

    .red-recording-dot {
        font-size: 25px;
        color: red;
        margin-right: 12px;
        /*transitions with Firefox, IE and Opera Support browser support*/
        animation-name: flashing-recording-dot;
        -webkit-animation-name: flashing-recording-dot;
        -moz-animation-name: flashing-recording-dot;
        -o-animation-name: flashing-recording-dot;
        animation-duration: 2s;
        -webkit-animation-duration: 2s;
        -moz-animation-duration: 2s;
        -o-animation-duration: 2s;
        animation-iteration-count: infinite;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
    }

    /* The animation code */
    @keyframes flashing-recording-dot {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @-webkit-keyframes flashing-recording-dot {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @-moz-keyframes flashing-recording-dot {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @-o-keyframes flashing-recording-dot {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    .elapsed-time {
        font-size: 32px;
    }

    .recording-contorl-buttons-container.hide {
        display: none;
    }

    .overlay {
        position: absolute;
        top: 0;
        height: 100vh;
        width: 100%;
        background-color: rgba(82, 76, 76, 0.35);
        /*targeting Chrome & Safari*/
        display: -webkit-flex;
        /*targeting IE10*/
        display: -ms-flex;
        display: flex;
        justify-content: center;
        /*horizontal centering*/
        align-items: center;
    }

    .overlay.hide {
        display: none;
    }

    .browser-not-supporting-audio-recording-box {
        /*targeting Chrome & Safari*/
        display: -webkit-flex;
        /*targeting IE10*/
        display: -ms-flex;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        /*horizontal centering*/
        align-items: center;
        width: 317px;
        height: 119px;
        background-color: white;
        border-radius: 10px;
        padding: 15px;
        font-size: 16px;
    }

    .close-browser-not-supported-box {
        cursor: pointer;
        background-color: #abc1c05c;
        border-radius: 10px;
        font-size: 16px;
        border: none;
    }

    .close-browser-not-supported-box:hover {
        background-color: #92a5a45c;
    }

    .close-browser-not-supported-box:focus {
        outline: none;
        border: none;
    }

    .audio-element.hide {
        display: none;
    }

    .text-indication-of-audio-playing-container {
        height: 20px;
    }

    .text-indication-of-audio-playing {
        font-size: 20px;
    }

    .text-indication-of-audio-playing.hide {
        display: none;
    }

    /* 3 Dots animation*/
    .text-indication-of-audio-playing span {
        /*transitions with Firefox, IE and Opera Support browser support*/
        animation-name: blinking-dot;
        -webkit-animation-name: blinking-dot;
        -moz-animation-name: blinking-dot;
        -o-animation-name: blinking-dot;
        animation-duration: 2s;
        -webkit-animation-duration: 2s;
        -moz-animation-duration: 2s;
        -o-animation-duration: 2s;
        animation-iteration-count: infinite;
        -webkit-animation-iteration-count: infinite;
        -moz-animation-iteration-count: infinite;
        -o-animation-iteration-count: infinite;
    }

    .text-indication-of-audio-playing span:nth-child(2) {
        animation-delay: .4s;
        -webkit-animation-delay: .4s;
        -moz-animation-delay: .4s;
        -o-animation-delay: .4s;
    }

    .text-indication-of-audio-playing span:nth-child(3) {
        animation-delay: .8s;
        -webkit-animation-delay: .8s;
        -moz-animation-delay: .8s;
        -o-animation-delay: .8s;
    }

    /* The animation code */
    @keyframes blinking-dot {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    /* The animation code */
    @-webkit-keyframes blinking-dot {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    /* The animation code */
    @-moz-keyframes blinking-dot {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }

    /* The animation code */
    @-o-keyframes blinking-dot {
        0% {
            opacity: 0;
        }

        50% {
            opacity: 1;
        }

        100% {
            opacity: 0;
        }
    }
    }

    /* Medium devices */

    @media (min-width: 768px) {}

    /* Large devices */

    @media (min-width: 992px) {}

    /*Ipad pro view*/

    /*
  @media (min-width: 1024px) {

  } */

    /* Extra Large devices */

    @media (min-width: 1200px) {}
    .flex  .rating .rate{
        color: #fbe233;
    }
    .flex  .rating .rate:hover{
        color: #fb4444;
    }

    .flex  .rating .rate:after{
        color: #000;
    }


</style>

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="w-full my-2">
        <h1 class="text-3xl">{{ $books->title }}</h1>

        @if (strlen($message) > 0)
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif
    </div>
    <div class="block w-full mt-5 ml-8">
        <div class="bg-yellow-400 p-0">

            <!-- more infor about PDF reader here  -->
            <!-- https://dearflip.com/support/ -->
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
    </div>

    <div class="w-full">
        <div class="audio-recording-container my-8">
            <h3 class="title text-orange-600">هل تريد تسجيل ملخص للكتاب بصوتك؟</h3>

        </div>


        <audio controls class="audio-element hide">
        </audio>


        <div id="controls flex w-full">
            <button id="recordButton"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                    </svg>
                    <span class="mx-2 ">بدء التسجيل</span>
                </div>
            </button>
            <button id="stopButton" disabled
                class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                <div class="flex">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="mx-2">توقف عن التسجيل</span>
                </div>
            </button>
            @if ($books->challenge)
            <form action="{{ route('readChallange_shares',$books->id) }}" method="post">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user_id }}">
                <button id="stopButton"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                <div class="flex">

                    <span class="mx-2"> مشاركة في التحدى  </span>
                </div>
            </button>.
            </form>
            @endif


        </div>
        <div id="formats"></div>
        <pre></pre>
        <span id="log" class="my-48 border-b-gray-500 border-b-2" dir="rtl"></span>

        <p id="your_record" class="my-8 text-xl font-bold text-black">تسجيلك</p>
        <ol id="recordingsList" class="row"></ol>
        @if (true)
            @if ($book_read >= 1)
                <p>تم تقيم من قبل</p>
            @else
                <form action="{{ route('student.read_book', $books->id) }}" method="post" enctype="multipart/form-data">
                    <div class="col-xxl-3 col-md-6  gy-4">
                        @csrf
                        <label class="form-label" for="project-title-input">هل قرات الكتاب </label>

                        <select class="form-select" name="state_read" data-choices data-choices-search-false
                            id="choices-status-input">
                            <option value="نعم" selected>نعم</option>
                            <option value="لا">لا </option>
                        </select>
                    </div>
                    <input type="hidden" name="user_id" value="{{ $user_id }}">

                    <br>
                    <div class="containereval">
                        <div class="fbevaluation">
                            <div class="row">
                                <div class="">

                                    <label class="form-label" for="project-title-input">تقييم </label>

                                </div>

                                <div class="flex space-x-1 rating" style="">
                                    <label for="star1">
                                        <input hidden wire:model="rating" type="radio" id="star1"
                                            name="evaluation" value="1" />
                                        <svg class="cursor-pointer block w-8 h-8 ratestar rate " fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    </label>

                                    <label for="star2">
                                        <input hidden wire:model="rating" type="radio" id="star2"
                                            name="evaluation" value="2" />
                                        <svg class="cursor-pointer block w-8 h-8 ratestar rate text-grey " fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    </label>
                                    <label for="star3">
                                        <input hidden wire:model="rating" type="radio" id="star3"
                                            name="evaluation" value="3" />
                                        <svg class="cursor-pointer block w-8 h-8 ratestar rate" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    </label>
                                    <label for="star4">
                                        <input hidden wire:model="rating" type="radio" id="star4"
                                            name="evaluation" value="4" />
                                        <svg class="cursor-pointer block w-8 h-8 ratestar rate" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    </label>
                                    <label for="star5">
                                        <input hidden wire:model="rating" type="radio" id="star5"
                                            name="evaluation" value="5" />
                                        <svg class="cursor-pointer block w-8 h-8 ratestar rate" fill="currentColor"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path
                                                d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                        </svg>
                                    </label>
                                </div>

                                    <br>                                <hr>
                                    <br>
                                    <br>

                                <div class="console"></div>

                                <br>
                                <br>
                            </div>

                            <div class="text-end mb-4">

                                <button type="submit" class="btn btn-success w-sm"
                                    style="background:green">إضافة</button>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>


                </form>
                @endif
                <p></p>
                @else
        @endif






        <br>
        <br>
        <br>
        <br>
        <br>

    </div>

<div class="w-full pb-10">
    <h2 class="my-8 text-xl font-bold text-blue-700">تسجيلات زملائك</h2>
    <hr>
    @foreach ($podcasts as $podcast)
        <div class="flex w-4/5 my-5">
            <div class="w-1/5">
                <p>{{ $podcast->student_name }}</p>
            </div>
            <div class="w-3/4">
                <audio src='{{ url("/file/audioFile/$podcast->file_name") }}' class="rounded-none" controls='on' />
            </div>
        </div>
    @endforeach
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


<script type="text/javascript">

let val = 0;
console.log($('input[name="evaluation"]:checked').val());
$(".rate").on("click", function(e){
    var val = $("input[name='evaluation']:checked").val();
    // var text_value = $this.val();
    console.log(val);
    // var trace = function(str){


        $(".console").empty();
        $('<p>'+val+'<svg style="color: #fbe233;" class="cursor-pointer block w-8 h-8 ratestar rate" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" /></svg>  </p>').appendTo(".console");
// };
//   trace(val);
});

trace($().jquery);
</script>

<script></script>


<script>
    //webkitURL is deprecated but nevertheless
    URL = window.URL || window.webkitURL;

    var gumStream; //stream from getUserMedia()
    var recorder; //WebAudioRecorder object
    var input; //MediaStreamAudioSourceNode  we'll be recording
    var encodingType; //holds selected encoding for resulting audio (file)
    var encodeAfterRecord = true; // when to encode

    // shim for AudioContext when it's not avb.
    var AudioContext = window.AudioContext || window.webkitAudioContext;
    var audioContext; //new audio context to help us record

    var encodingTypeSelect = document.getElementById("encodingTypeSelect");
    var recordButton = document.getElementById("recordButton");
    var stopButton = document.getElementById("stopButton");

    //add events to those 2 buttons
    recordButton.addEventListener("click", startRecording);
    stopButton.addEventListener("click", stopRecording);

    function startRecording() {

        console.log("startRecording() called");

        /*
        	Simple constraints object, for more advanced features see
        	https://addpipe.com/blog/audio-constraints-getusermedia/
        */

        var constraints = {
            audio: true,
            video: false
        }

        /*
    	We're using the standard promise based getUserMedia()
    	https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
	*/

        navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
            //__log("getUserMedia() success, stream created, initializing WebAudioRecorder...");

            var recoringMsg = 'جاري التسجيل الان...';
            __log(recoringMsg);


            /*
            	create an audio context after getUserMedia is called
            	sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
            	the sampleRate defaults to the one set in your OS for your playback device
            */
            audioContext = new AudioContext();

            console.log("audioContext 1");

            //update the format
            //document.getElementById("formats").innerHTML="Format: 2 channel "+encodingTypeSelect.options[encodingTypeSelect.selectedIndex].value+" @ "+audioContext.sampleRate/1000+"kHz"

            //document.getElementById("formats").innerHTML = "Format: 2 channel mp3 @ " + audioContext.sampleRate / 1000 + "kHz"

            //assign to gumStream for later use
            gumStream = stream;

            /* use the stream */
            input = audioContext.createMediaStreamSource(stream);

            //stop the input from playing back through the speakers
            //input.connect(audioContext.destination)

            //get the encoding
            encodingType = 'mp3'; // encodingTypeSelect.options[encodingTypeSelect.selectedIndex].value;

            console.log("audioContext 2");

            //disable the encoding selector
            //encodingTypeSelect.disabled = true;

            recorder = new WebAudioRecorder(input, {
                workerDir: "../js/", // must end with slash
                encoding: encodingType,
                numChannels: 2, //2 is the default, mp3 encoding supports only 2
                onEncoderLoading: function(recorder, encoding) {
                    // show "loading encoder..." display
                    //__log("Loading " + encoding + " encoder...");
                },
                onEncoderLoaded: function(recorder, encoding) {
                    // hide "loading encoder..." display
                    //__log(encoding + " encoder loaded");
                }
            });

            recorder.onComplete = function(recorder, blob) {
                //__log("Encoding complete");
                createDownloadLink(blob, recorder.encoding);
                //encodingTypeSelect.disabled = false;
            }

            recorder.setOptions({
                timeLimit: 300,
                encodeAfterRecord: encodeAfterRecord,
                ogg: {
                    quality: 0.5
                },
                mp3: {
                    bitRate: 160
                }
            });

            //start the recording process
            recorder.startRecording();

            //__log("Recording started");

        }).catch(function(err) {
            //enable the record button if getUSerMedia() fails
            __log("Error: " + err);
            recordButton.disabled = false;
            stopButton.disabled = true;

        });

        //disable the record button
        recordButton.disabled = true;
        stopButton.disabled = false;
    }

    function stopRecording() {
        console.log("stopRecording() called");

        //stop microphone access
        gumStream.getAudioTracks()[0].stop();

        //disable the stop button
        stopButton.disabled = true;
        recordButton.disabled = false;

        //tell the recorder to finish the recording (stop recording + encode the recorded audio)
        recorder.finishRecording();

        //__log('Recording stopped');
    }

    function createDownloadLink(blob, encoding) {

        var url = URL.createObjectURL(blob);
        var au = document.createElement('audio');
        var li = document.createElement('li');
        var link = document.createElement('a');

        //name of .wav file to use during upload and download (without extendion)
        var filename = new Date().toISOString();

        //add controls to the <audio> element
        au.controls = true;
        au.src = url;

        //link the a element to the blob
        link.href = url;
        link.download = new Date().toISOString() + '.' + encoding;
        link.innerHTML = link.download;

        //add the new audio and a elements to the li element
        li.appendChild(au);

        // li.appendChild(link);


        //upload link
        var upload = document.createElement('button');
        upload.href = "#";
        upload.innerHTML = "رفع التسجيل";
        upload.addEventListener("click", function(event) {
            var xhr = new XMLHttpRequest();
            xhr.onload = function(e) {
                if (this.readyState === 4) {
                    alert('تم رفع تسجيلك بنجاح');
                    console.log("Server returned: ", e.target.responseText);
                }
            };
            var fd = new FormData();
            fd.append("file", blob, filename);
            fd.append('_token', '{{ csrf_token() }}');
            fd.append('book_id', '{{ $bookID }}');
            xhr.open("POST", "{{ URL::to('/uploadAudio') }}", true);
            xhr.send(fd);
        })
        //li.appendChild(document.createTextNode(" - ")) //add a space in between
        li.appendChild(upload) //add the upload link to li

        // delete past records
        recordingsList.innerHTML = "";

        //add the li element to the ordered list
        recordingsList.appendChild(li);
    }

    //helper function
    function __log(e, data) {
        log.innerHTML = "\n" + e + " " + (data || '');
    }
</script>




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


    <style>
        /* Media Queries */

        /* Small Devices*/

        @media (min-width: 0px) {
            /* {
                box-sizing: border-box;
            }

            body {
                margin: 0;
                padding: 0;
                background-color: lightcyan;
                color: #414142;
                position: relative;
                font-family: monospace;
            }*/

            /*.title {
                font-size: 30px;
                margin-bottom: 55px;
                text-align: center;
            }

            .audio-recording-container {
                width: 100%;
                height: 100vh;
                /* view port height*/
            /*targeting Chrome & Safari*/
            display: -webkit-flex;
            /*targeting IE10*/
            display: -ms-flex;
            display: flex;
            /* flex-direction: column; */
            justify-content: center;
            /*horizontal centering*/
            align-items: center;
        }

        .start-recording-button {
            font-size: 70px;
            color: #435f7a;
            cursor: pointer;
            opacity: .5;
            margin-bottom: 30px;
        }

        .start-recording-button:hover {
            opacity: 1;
        }

        .recording-contorl-buttons-container {
            /*targeting Chrome & Safari*/
            display: -webkit-flex;
            /*targeting IE10*/
            display: -ms-flex;
            display: flex;
            justify-content: space-evenly;
            /*horizontal centering*/
            align-items: center;
            width: 334px;
            margin-bottom: 30px;
        }

        .cancel-recording-button,
        .stop-recording-button {
            font-size: 70px;
            cursor: pointer;
        }

        .cancel-recording-button {
            color: red;
            opacity: 0.7;
        }

        .cancel-recording-button:hover {
            color: rgb(206, 4, 4);
        }

        .stop-recording-button {
            color: #33cc33;
            opacity: 0.7;
        }

        .stop-recording-button:hover {
            color: #27a527;
        }

        .recording-elapsed-time {
            /*targeting Chrome & Safari*/
            display: -webkit-flex;
            /*targeting IE10*/
            display: -ms-flex;
            display: flex;
            justify-content: center;
            /*horizontal centering*/
            align-items: center;
        }

        .red-recording-dot {
            font-size: 25px;
            color: red;
            margin-right: 12px;
            /*transitions with Firefox, IE and Opera Support browser support*/
            animation-name: flashing-recording-dot;
            -webkit-animation-name: flashing-recording-dot;
            -moz-animation-name: flashing-recording-dot;
            -o-animation-name: flashing-recording-dot;
            animation-duration: 2s;
            -webkit-animation-duration: 2s;
            -moz-animation-duration: 2s;
            -o-animation-duration: 2s;
            animation-iteration-count: infinite;
            -webkit-animation-iteration-count: infinite;
            -moz-animation-iteration-count: infinite;
            -o-animation-iteration-count: infinite;
        }

        /* The animation code */
        @keyframes flashing-recording-dot {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-webkit-keyframes flashing-recording-dot {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-moz-keyframes flashing-recording-dot {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @-o-keyframes flashing-recording-dot {
            0% {
                opacity: 1;
            }

            50% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .elapsed-time {
            font-size: 32px;
        }

        .recording-contorl-buttons-container.hide {
            display: none;
        }

        .overlay {
            position: absolute;
            top: 0;
            height: 100vh;
            width: 100%;
            background-color: rgba(82, 76, 76, 0.35);
            /*targeting Chrome & Safari*/
            display: -webkit-flex;
            /*targeting IE10*/
            display: -ms-flex;
            display: flex;
            justify-content: center;
            /*horizontal centering*/
            align-items: center;
        }

        .overlay.hide {
            display: none;
        }

        .browser-not-supporting-audio-recording-box {
            /*targeting Chrome & Safari*/
            display: -webkit-flex;
            /*targeting IE10*/
            display: -ms-flex;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /*horizontal centering*/
            align-items: center;
            width: 317px;
            height: 119px;
            background-color: white;
            border-radius: 10px;
            padding: 15px;
            font-size: 16px;
        }

        .close-browser-not-supported-box {
            cursor: pointer;
            background-color: #abc1c05c;
            border-radius: 10px;
            font-size: 16px;
            border: none;
        }

        .close-browser-not-supported-box:hover {
            background-color: #92a5a45c;
        }

        .close-browser-not-supported-box:focus {
            outline: none;
            border: none;
        }

        .audio-element.hide {
            display: none;
        }

        .text-indication-of-audio-playing-container {
            height: 20px;
        }

        .text-indication-of-audio-playing {
            font-size: 20px;
        }

        .text-indication-of-audio-playing.hide {
            display: none;
        }

        /* 3 Dots animation*/
        .text-indication-of-audio-playing span {
            /*transitions with Firefox, IE and Opera Support browser support*/
            animation-name: blinking-dot;
            -webkit-animation-name: blinking-dot;
            -moz-animation-name: blinking-dot;
            -o-animation-name: blinking-dot;
            animation-duration: 2s;
            -webkit-animation-duration: 2s;
            -moz-animation-duration: 2s;
            -o-animation-duration: 2s;
            animation-iteration-count: infinite;
            -webkit-animation-iteration-count: infinite;
            -moz-animation-iteration-count: infinite;
            -o-animation-iteration-count: infinite;
        }

        .text-indication-of-audio-playing span:nth-child(2) {
            animation-delay: .4s;
            -webkit-animation-delay: .4s;
            -moz-animation-delay: .4s;
            -o-animation-delay: .4s;
        }

        .text-indication-of-audio-playing span:nth-child(3) {
            animation-delay: .8s;
            -webkit-animation-delay: .8s;
            -moz-animation-delay: .8s;
            -o-animation-delay: .8s;
        }

        /* The animation code */
        @keyframes blinking-dot {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        /* The animation code */
        @-webkit-keyframes blinking-dot {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        /* The animation code */
        @-moz-keyframes blinking-dot {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        /* The animation code */
        @-o-keyframes blinking-dot {
            0% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
        }

        /* Medium devices */

        @media (min-width: 768px) {}

        /* Large devices */

        @media (min-width: 992px) {}

        /*Ipad pro view*/

        /*
      @media (min-width: 1024px) {

      } */

        /* Extra Large devices */

        @media (min-width: 1200px) {}
        .flex  .rating .rate{
            color: #fbe233;
        }
        .flex  .rating .rate:hover{
            color: #fb4444;
        }

        .flex  .rating .rate:after{
            color: #000;
        }


    </style>

    <div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
            <h1 class="text-3xl">{{ $books->title }}</h1>

            @if (strlen($message) > 0)
                <div class="alert alert-success" role="alert">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="block w-full mt-5 ml-8">
            <div class="bg-yellow-400 p-0">

                <!-- more infor about PDF reader here  -->
                <!-- https://dearflip.com/support/ -->
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
        </div>

        <div class="w-full">
            <div class="audio-recording-container my-8">
                <h3 class="title text-orange-600">هل تريد تسجيل ملخص للكتاب بصوتك؟</h3>

            </div>


            <audio controls class="audio-element hide">
            </audio>


            <div id="controls flex w-full">
                <button id="recordButton"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                        </svg>
                        <span class="mx-2 ">بدء التسجيل</span>
                    </div>
                </button>
                <button id="stopButton" disabled
                    class="text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 focus:outline-none dark:focus:ring-red-800">
                    <div class="flex">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8 7a1 1 0 00-1 1v4a1 1 0 001 1h4a1 1 0 001-1V8a1 1 0 00-1-1H8z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="mx-2">توقف عن التسجيل</span>
                    </div>
                </button>
                @if ($books->challenge)
                <form action="{{ route('readChallange_shares',$books->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user_id }}">
                    <button id="stopButton"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                    <div class="flex">

                        <span class="mx-2"> مشاركة في التحدى  </span>
                    </div>
                </button>.
                </form>
                @endif


            </div>
            <div id="formats"></div>
            <pre></pre>
            <span id="log" class="my-48 border-b-gray-500 border-b-2" dir="rtl"></span>

            <p id="your_record" class="my-8 text-xl font-bold text-black">تسجيلك</p>
            <ol id="recordingsList" class="row"></ol>
            @if (true)
                @if ($book_read >= 1)
                    <p>تم تقيم من قبل</p>
                @else
                    <form action="{{ route('student.read_book', $books->id) }}" method="post" enctype="multipart/form-data">
                        <div class="col-xxl-3 col-md-6  gy-4">
                            @csrf
                            <label class="form-label" for="project-title-input">هل قرات الكتاب </label>

                            <select class="form-select" name="state_read" data-choices data-choices-search-false
                                id="choices-status-input">
                                <option value="نعم" selected>نعم</option>
                                <option value="لا">لا </option>
                            </select>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user_id }}">

                        <br>
                        <div class="containereval">
                            <div class="fbevaluation">
                                <div class="row">
                                    <div class="">

                                        <label class="form-label" for="project-title-input">تقييم </label>

                                    </div>

                                    <div class="flex space-x-1 rating" style="">
                                        <label for="star1">
                                            <input hidden wire:model="rating" type="radio" id="star1"
                                                name="evaluation" value="1" />
                                            <svg class="cursor-pointer block w-8 h-8 ratestar rate " fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </label>

                                        <label for="star2">
                                            <input hidden wire:model="rating" type="radio" id="star2"
                                                name="evaluation" value="2" />
                                            <svg class="cursor-pointer block w-8 h-8 ratestar rate text-grey " fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </label>
                                        <label for="star3">
                                            <input hidden wire:model="rating" type="radio" id="star3"
                                                name="evaluation" value="3" />
                                            <svg class="cursor-pointer block w-8 h-8 ratestar rate" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </label>
                                        <label for="star4">
                                            <input hidden wire:model="rating" type="radio" id="star4"
                                                name="evaluation" value="4" />
                                            <svg class="cursor-pointer block w-8 h-8 ratestar rate" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </label>
                                        <label for="star5">
                                            <input hidden wire:model="rating" type="radio" id="star5"
                                                name="evaluation" value="5" />
                                            <svg class="cursor-pointer block w-8 h-8 ratestar rate" fill="currentColor"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path
                                                    d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" />
                                            </svg>
                                        </label>
                                    </div>

                                        <br>                                <hr>
                                        <br>
                                        <br>

                                    <div class="console"></div>

                                    <br>
                                    <br>
                                </div>

                                <div class="text-end mb-4">

                                    <button type="submit" class="btn btn-success w-sm"
                                        style="background:green">إضافة</button>
                                </div>

                            </div>
                        </div>
                        </div>
                    </div>


                    </form>
                    @endif
                    <p></p>
                    @else
            @endif






            <br>
            <br>
            <br>
            <br>
            <br>

        </div>

    <div class="w-full pb-10">
        <h2 class="my-8 text-xl font-bold text-blue-700">تسجيلات زملائك</h2>
        <hr>
        @foreach ($podcasts as $podcast)
            <div class="flex w-4/5 my-5">
                <div class="w-1/5">
                    <p>{{ $podcast->student_name }}</p>
                </div>
                <div class="w-3/4">
                    <audio src='{{ url("/file/audioFile/$podcast->file_name") }}' class="rounded-none" controls='on' />
                </div>
            </div>
        @endforeach
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


    <script type="text/javascript">

    let val = 0;
    console.log($('input[name="evaluation"]:checked').val());
    $(".rate").on("click", function(e){
        var val = $("input[name='evaluation']:checked").val();
        // var text_value = $this.val();
        console.log(val);
        // var trace = function(str){


            $(".console").empty();
            $('<p>'+val+'<svg style="color: #fbe233;" class="cursor-pointer block w-8 h-8 ratestar rate" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z" /></svg>  </p>').appendTo(".console");
    // };
    //   trace(val);
    });

    trace($().jquery);
    </script>

    <script></script>


    <script>
        //webkitURL is deprecated but nevertheless
        URL = window.URL || window.webkitURL;

        var gumStream; //stream from getUserMedia()
        var recorder; //WebAudioRecorder object
        var input; //MediaStreamAudioSourceNode  we'll be recording
        var encodingType; //holds selected encoding for resulting audio (file)
        var encodeAfterRecord = true; // when to encode

        // shim for AudioContext when it's not avb.
        var AudioContext = window.AudioContext || window.webkitAudioContext;
        var audioContext; //new audio context to help us record

        var encodingTypeSelect = document.getElementById("encodingTypeSelect");
        var recordButton = document.getElementById("recordButton");
        var stopButton = document.getElementById("stopButton");

        //add events to those 2 buttons
        recordButton.addEventListener("click", startRecording);
        stopButton.addEventListener("click", stopRecording);

        function startRecording() {

            console.log("startRecording() called");

            /*
                Simple constraints object, for more advanced features see
                https://addpipe.com/blog/audio-constraints-getusermedia/
            */

            var constraints = {
                audio: true,
                video: false
            }

            /*
            We're using the standard promise based getUserMedia()
            https://developer.mozilla.org/en-US/docs/Web/API/MediaDevices/getUserMedia
        */

            navigator.mediaDevices.getUserMedia(constraints).then(function(stream) {
                //__log("getUserMedia() success, stream created, initializing WebAudioRecorder...");

                var recoringMsg = 'جاري التسجيل الان...';
                __log(recoringMsg);


                /*
                    create an audio context after getUserMedia is called
                    sampleRate might change after getUserMedia is called, like it does on macOS when recording through AirPods
                    the sampleRate defaults to the one set in your OS for your playback device
                */
                audioContext = new AudioContext();

                console.log("audioContext 1");

                //update the format
                //document.getElementById("formats").innerHTML="Format: 2 channel "+encodingTypeSelect.options[encodingTypeSelect.selectedIndex].value+" @ "+audioContext.sampleRate/1000+"kHz"

                //document.getElementById("formats").innerHTML = "Format: 2 channel mp3 @ " + audioContext.sampleRate / 1000 + "kHz"

                //assign to gumStream for later use
                gumStream = stream;

                /* use the stream */
                input = audioContext.createMediaStreamSource(stream);

                //stop the input from playing back through the speakers
                //input.connect(audioContext.destination)

                //get the encoding
                encodingType = 'mp3'; // encodingTypeSelect.options[encodingTypeSelect.selectedIndex].value;

                console.log("audioContext 2");

                //disable the encoding selector
                //encodingTypeSelect.disabled = true;

                recorder = new WebAudioRecorder(input, {
                    workerDir: "../js/", // must end with slash
                    encoding: encodingType,
                    numChannels: 2, //2 is the default, mp3 encoding supports only 2
                    onEncoderLoading: function(recorder, encoding) {
                        // show "loading encoder..." display
                        //__log("Loading " + encoding + " encoder...");
                    },
                    onEncoderLoaded: function(recorder, encoding) {
                        // hide "loading encoder..." display
                        //__log(encoding + " encoder loaded");
                    }
                });

                recorder.onComplete = function(recorder, blob) {
                    //__log("Encoding complete");
                    createDownloadLink(blob, recorder.encoding);
                    //encodingTypeSelect.disabled = false;
                }

                recorder.setOptions({
                    timeLimit: 300,
                    encodeAfterRecord: encodeAfterRecord,
                    ogg: {
                        quality: 0.5
                    },
                    mp3: {
                        bitRate: 160
                    }
                });

                //start the recording process
                recorder.startRecording();

                //__log("Recording started");

            }).catch(function(err) {
                //enable the record button if getUSerMedia() fails
                __log("Error: " + err);
                recordButton.disabled = false;
                stopButton.disabled = true;

            });

            //disable the record button
            recordButton.disabled = true;
            stopButton.disabled = false;
        }

        function stopRecording() {
            console.log("stopRecording() called");

            //stop microphone access
            gumStream.getAudioTracks()[0].stop();

            //disable the stop button
            stopButton.disabled = true;
            recordButton.disabled = false;

            //tell the recorder to finish the recording (stop recording + encode the recorded audio)
            recorder.finishRecording();

            //__log('Recording stopped');
        }

        function createDownloadLink(blob, encoding) {

            var url = URL.createObjectURL(blob);
            var au = document.createElement('audio');
            var li = document.createElement('li');
            var link = document.createElement('a');

            //name of .wav file to use during upload and download (without extendion)
            var filename = new Date().toISOString();

            //add controls to the <audio> element
            au.controls = true;
            au.src = url;

            //link the a element to the blob
            link.href = url;
            link.download = new Date().toISOString() + '.' + encoding;
            link.innerHTML = link.download;

            //add the new audio and a elements to the li element
            li.appendChild(au);

            // li.appendChild(link);


            //upload link
            var upload = document.createElement('button');
            upload.href = "#";
            upload.innerHTML = "رفع التسجيل";
            upload.addEventListener("click", function(event) {
                var xhr = new XMLHttpRequest();
                xhr.onload = function(e) {
                    if (this.readyState === 4) {
                        alert('تم رفع تسجيلك بنجاح');
                        console.log("Server returned: ", e.target.responseText);
                    }
                };
                var fd = new FormData();
                fd.append("file", blob, filename);
                fd.append('_token', '{{ csrf_token() }}');
                fd.append('book_id', '{{ $bookID }}');
                xhr.open("POST", "{{ URL::to('/uploadAudio') }}", true);
                xhr.send(fd);
            })
            //li.appendChild(document.createTextNode(" - ")) //add a space in between
            li.appendChild(upload) //add the upload link to li

            // delete past records
            recordingsList.innerHTML = "";

            //add the li element to the ordered list
            recordingsList.appendChild(li);
        }

        //helper function
        function __log(e, data) {
            log.innerHTML = "\n" + e + " " + (data || '');
        }
    </script>


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


@include('student.footer')
