@include('student.header')

<!-- <link rel="stylesheet" href="{{asset('flipBook/css/style.css')}}"> -->

<style>
    .cursor {
        background-color: red;
    }

    .done {
        color: #bbb;
    }

    #typing {
        margin: 0 auto;        
    }

    #stats {
        margin: 0 auto;
        width: 300px;
    }

    .hidden {
        display: none;
    }
    
</style>

<div class="w-full bg-white py-10 px-5 h-screen">
    <div class="flex">
        <div class="block w-3/4">
            <div class="mb-4">                                 
                <h1 class="text-2xl">لعبة سرعة الطباعة</h1>                
            </div>
            <div class="row">
                <div class="col-md-12">
                    <button id="start-game" class="btn btn-success" onclick="startGame();">إبدا اللعب</button>    
                    <div id="stats" class="my-5"></div>
                    <div id="typing" class="my-5 w-3/4 text-xl font-light"></div>                    
                </div>
            </div>
        </div>
        <div class="w-3/12">
            <br>
            <br>            
            <h2>قائمة المتسابقين</h2>            
            @foreach ($students as $student)
                <div class="row">
                    <div class="col-md-12">{{$student->name}} - {{$student->typeing_speed}}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    const typingDiv = document.getElementById("typing");
    const statsDiv = document.getElementById("stats");
    const startGameBtn = document.getElementById("start-game");

    // const pharagraphs = [
    //     `The oldest classical Greek and Latin writing had little or no space between words and could be written in boustrophedon (alternating directions).`,
    //     `The Rocker is a 2008 American comedy film directed by Peter Cattaneo and written by Maya Forbes and Wallace Wolodarsky, from a story by Ryan Jaffe. The film stars Rainn Wilson as a failed musician who goes on tour with his nephew's band after one of their songs goes viral. Christina Applegate, Jeff Garlin, Josh Gad, Teddy Geiger and Emma Stone also star. It was released on August 20, 2008, received mixed reviews and was a box office bomb, grossing just $8 million against its $15 million budget.`,
    // ];

    const pharagraphs = [
        'الفراشة ملونة تطير فى البستان ، حلوة مهندمة تدهش الإنسان ، أهدافها محددة ، حركاتها مرتبة تحوم بإنتظام ، تحط فى نعومة تنشر السلام ، فراشة ملونة تطير بلا انقطاع ، فى النهار المشرق تملأ البقاع ، تحب الورد المزروع ، تلثمه فى وقت الجوع ، كما تمتص رحيق الأزهار ، وتطير بإنتظام',
        'أبو محمد صياد صغير يخرج كل صباح إلى الشاطئ ليصطاد بعض الاسماك ، ثم يبيعها بثمن قليل ليشترى بهذا الثمن طعام أو حاجات بسيطة له لكافة افراد عائلته ، وفى يوم عاد حزينا لأنه لم يتمكن من صيد ولا حتى سمكة ، وعنم استيقظ ابنه لاحظ حزن ابيه ، فقرر مساعدته ووده بان يصيد سمكة كبيرة ليبيعها بثمن غالى .وبالفعل اصطاد محمد سمكة كبيرة بعد وقت طويل وباعها فى السوق بسعر غالى واشترى كال مايحتاجه',
        'أنت محظوظ هذه اقصر جملة في لعبة الطباعة السريعة, اكسب الان'
    ]

    const startGame = () => {
        // startGameBtn.classList.add("hidden");
        typingDiv.innerHTML = "";
        statsDiv.innerHTML = "";

        const text = pharagraphs[parseInt(Math.random() * pharagraphs.length)];

        const characters = text.split("").map((char) => {
            const span = document.createElement("span");
            span.innerText = char;
            typingDiv.appendChild(span);
            return span;
        });

        let cursorIndex = 0;
        let cursorCharacter = characters[cursorIndex];
        cursorCharacter.classList.add("cursor");

        let startTime = null;

        const keydown = ({
            key
        }) => {
            if (!startTime) {
                startTime = new Date();
            }

            if (key === cursorCharacter.innerText) {
                cursorCharacter.classList.remove("cursor");
                cursorCharacter.classList.add("done");
                cursorCharacter = characters[++cursorIndex];
            }

            if (cursorIndex >= characters.length) {
                // game ended
                const endTime = new Date();
                const delta = endTime - startTime;
                const seconds = delta / 1000;
                const numberOfWords = text.split(" ").length;
                const wps = numberOfWords / seconds;
                const wpm = wps * 60.0;
                document.getElementById("stats").innerText = `كلمة لكل دقيقة = ${parseInt(wpm)}`;
                document.removeEventListener("keydown", keydown);
                startGameBtn.classList.remove("hidden");
                updateSpeed(parseInt(wpm));
                return;
            }

            cursorCharacter.classList.add("cursor");
        };

        document.addEventListener("keydown", keydown);
    };

    function updateSpeed(speed){
        var xhr = new XMLHttpRequest();
        xhr.onload = function(e) {
            if (this.readyState === 4) {
                alert('تم رفع تسجيلك بنجاح');
                console.log("Server returned: ", e.target.responseText);
            }
        };
        var fd = new FormData();        
        fd.append('_token' , '{{ csrf_token() }}');
        fd.append('speed' , speed);
        xhr.open("POST", "{{ URL::to('/student/speedTypeing') }}", true);
        xhr.send(fd);
    }
</script>
@include('student.footer')