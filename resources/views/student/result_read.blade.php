<!DOCTYPE html>
<html>

<head>

    <style>
        @media print {
  #printPageButton {
    display: none;
  }
}
    </style>
    <!-- Script to print the content of a div -->
    {{-- <script>
        function printDiv() {
            var divContents = document.getElementById("GFG").innerHTML;
            var a = window.open('', '', 'height=500, width=500');
            a.document.write('<html>');
            a.document.write('<body > <h1>Div contents are <br>');
            a.document.write(divContents);
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script> --}}
</head>

<body >

    <div id="GFG" style="    margin: 109px;
    direction: rtl;
    border: 1px solid #ccc;
    padding: 21px;">


@if ($parameter == 1)
<h1 class="text-3xl"> الجواز الاول </h1>
@elseif ($parameter == 2)
<h1 class="text-3xl"> الجواز التاني </h1>
@elseif ($parameter == 3)
<h1 class="text-3xl"> الجواز الثالث </h1>
@elseif ($parameter == 4)
<h1 class="text-3xl"> الجواز الرابع </h1>
@elseif ($parameter == 5)
<h1 class="text-3xl"> الجواز الخامس </h1>

@endif
        <h2>من مبادرة تحدى القراءة العربي </h2>
        <h2>الى من يهمه الامر</h2>
        <p>
            يرجى من جميع المشرفين المشاركين في تحدى القراءة العربي مساعدة حامل هذا الجواز من خلال
            <br>
            منحة تاشيرة قراءه لدى انتهائه من قراءه كل كتاب واقتراح كتب جديدة مناسبة له من غير تاخير او اعاقة واستبدال
            هذا الجواز بالذي يليه حال انتخائه
        </p>

        <span style="    margin-left: 44px;"><strong
                style="    padding: 5px;
            background: #ebff49;border: 1px solid;"> صدر في </strong> : ينبع
        </span> <span style="    margin-left: 44px;"><strong
                style="    padding: 5px;
            background: #ebff49;border: 1px solid;"> بتاريخ </strong> : {{ date('Y-m-d ') }}
        </span>

        <p><span style="margin-left: 44px;"><strong style="padding: 5px; background: #ebff49;border: 1px solid;"> الاسم  </strong>   :   <span>{{  $user->name }}</span>
        <p><span style="margin-left: 44px;"><strong style="padding: 5px; background: #ebff49;border: 1px solid;"> الصف   </strong>   :  <span>{{ ( ($user->ClassName) ? $user->ClassName->name : '')}} / {{ (($user->ClassName) ? $user->ClassName->Classroom->name : '') }}</span>
        <p><span style="margin-left: 44px;"><strong style="padding: 5px; background: #ebff49;border: 1px solid;"> المدرسة   </strong>  :  <span>{{  $user->School->name }}</span>
        <p><span style="margin-left: 44px;"><strong style="padding: 5px; background: #ebff49;border: 1px solid;"> المشرف  </strong>  : {{ ( ($user->ClassName) ? $user->ClassName->admin->name: '')}} </span>
    </span></p>

    <button id="printPageButton" onClick="window.print();">Print</button>

    </div>


</body>

</html>
