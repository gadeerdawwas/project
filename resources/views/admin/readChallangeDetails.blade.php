@include('admin.header')

<div class="mx-auto bg-white w-[210mm] h-[297mm] rounded-md">
    <!-- <br>
    <div class="row">
        <div class="col-md-12">
            <h1>تفاصيل الطلب</h1>
        </div>
    </div>
    <hr> -->
    <!-- <div class="row">
        <div class="col-md-6">
            <p><strong>صدر في:</strong> {{ $request->created_at }} </p>
        </div>
        <div class="col-md-6">
            <p><strong>بتاريخ:</strong> {{ date("Y-m-d H:i:s") }} </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>الاسم:</strong> {{ $request->student_name }} </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>المدرسة:</strong> {{ $request->school_name }} </p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p><strong>المشرف:</strong> {{ $superviser_name }} </p>
        </div>
    </div> -->
    <div class="block w-auto">
        <p><strong class="reading_header">عنوان الكتاب:</strong> {{ $request->title }} </p>
    </div>
    <div class="block w-auto">
        <p><strong class="reading_header">اسم المؤلف:</strong> {{ $request->writer_name }} </p>
    </div>
    <div class="block w-auto">
        <p><strong class="reading_header">دار النشر:</strong> {{ $request->publishing_house }} </p>
    </div>
    <div class="block w-auto">
        <p><strong class="reading_header">عدد الصفحات:</strong> {{ $request->pages }} </p>
    </div>
    <div class="block w-auto">
        <p><strong class="reading_header">ملخص الكتاب وفكرته:</strong></p>
        <p class="h-[400px]">{{ $request->summary }} </p>
    </div>
    <div class="block w-auto bottom-20 absolute">
        <p><strong class="reading_header">تاريخ اتمام القراءة:</strong> {{ $request->complete_date }} </p>
    </div>
    <div class="block w-auto mt-15">
        <button class="btn mt-15 btn-primary d-print-none" onclick="window.print();" >طباعة</button>
    </div>
    <br/>
    <br/>
</div>

@include('admin.footer')
