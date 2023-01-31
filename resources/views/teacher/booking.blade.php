@include('teacher.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <h1 class="text-2xl font-bold mb-4">احجز الان</h1>
        <div class="my-0">
            <div class="w-[500px] h-auto pb-0">
                @if (strlen($error_message) > 0)
                    <div class="danger my-3" role="alert">
                        {!! $error_message !!}
                    </div>
                @endif
            </div>
        </div>
        <div class="w-[500px] h-auto pb-8">
            <div class="relative overflow-x-clip shadow-md sm:rounded-lg p-3 bg-yellow-200">
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="date" class="form-label">اختر تاريخ الحجز</label>
                        <input type="date" name="date" class="input" id="date" placeholder="2022-05-15" value="{{ old('date') }}" />
                    </div>
                    <div class="mb-3">
                        <label for="slot" class="form-label">حدد رقم الحصة المطلوب حجزها</label>
                        <select name="slot" id="slot" class="input">                            
                            @for ($i = 1; $i <= 7 ; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="submit" class="submit" value="بحث عن الحجز" />
                    </div>
                </form>
            </div>
        </div>
    </div>

@include('teacher.footer')