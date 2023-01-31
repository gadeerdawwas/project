@include('teacher.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">            
            <h1 class="text-2xl font-semibold">قائمة حجوزاتك</h1>
        </div>        
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
            <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>                        
                        <th scope="col" class="px-6 py-3">تاريخ الحجز</th>                        
                        <th scope="col" class="px-6 py-3">رقم الحصة المحجوزة</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" >
                            <th scope="col">{{$appointment->id}}</th>                            
                            <td class="px-6 py-2">{{$appointment->date}}</td>                            
                            <td class="px-6 py-2">{{$appointment->slot}}</td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>        
    </div>

@include('teacher.footer')