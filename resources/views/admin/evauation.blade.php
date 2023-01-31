@include('admin.header')

    <div class="w-full bg-white py-10 px-5 h-screen">
        <div class="w-full my-2">
            <div class="col-md-6">
               <h2>تقييم الطلاب</h2>
            </div>
        </div>
        <div class="relative overflow-x-clip shadow-md sm:rounded-lg">
            <table class="w-full px-6 text-sm text-center text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">اسم الطالب</th>
                        <th scope="col" class="px-6 py-3">اسم الكتاب </th>
                        <th scope="col" class="px-6 py-3">هل تمت القراءه </th>
                        <th scope="col" class="px-6 py-3">تقييم </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($book_read as $book_r)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700" >
                            <th scope="col">{{$book_r->id}}</th>
                            <th scope="col">{{$book_r->Student->name}}</th>
                            <td class="px-6 py-2">{{(($book_r->Books) ? $book_r->Books->title : '')}}</td>
                            <td class="px-6 py-2">{{$book_r->state_read}}</td>
                            <td class="px-6 py-2">


                                @if($book_r->evaluation == 1)
                                    <div class="flex space-x-1 rating" style="color: #fbe233;" >
                                        <label for="star1" style="display: contents;">
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </label>
                                    </div>
                                @endif
                                @if($book_r->evaluation == 2)
                                    <div class="flex space-x-1 rating" style="color: #fbe233;">
                                        <label for="star1" style="display: contents;">
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </label>
                                    </div>
                                @endif
                                @if($book_r->evaluation == 3)
                                    <div class="flex space-x-1 rating" style="color: #fbe233;">
                                        <label for="star1" style="display: contents;">
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </label>
                                    </div>
                                @endif
                                @if($book_r->evaluation == 4)
                                    <div class="flex space-x-1 rating" style="color: #fbe233;">
                                        <label for="star1" style="display: contents;">
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </label>
                                    </div>
                                @endif
                                @if($book_r->evaluation == 5)
                                    <div class="flex space-x-1 rating" style="color: #fbe233;">
                                        <label for="star1" style="display: contents;">
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                            <svg class="cursor-pointer block w-8 h-8  " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                        </label>
                                    </div>
                                @endif



                                {{-- @if($book_r->evaluation =='love')
                                <label for="love"><img src="{{ asset('images/smile.png') }}" style="width:30px"> </label>

                                @endif
                                @if($book_r->evaluation =='sad')
                                <label for="sad"><img src="{{ asset('images/sad-face.png') }}" style="width:30px"> </label>

                                @endif
                                @if($book_r->evaluation =='angry')
                                <label for="angry"><img src="{{ asset('images/angry.png') }}" style="width:30px"> </label>

                                @endif --}}
{{--
                                <div class="flex space-x-1 rating" style="color: #fbe233;">
                                    <label for="star1" style="display: contents;">
                                        <input hidden wire:model="rating" style="color: #fbe233;" type="radio" id="star1" name="rating" style="color: #fbe233;" value="1" />
                                        <svg class="cursor-pointer block w-8 h-8 @if($evaluation >= 1 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </label>
                                    <label for="star2">
                                        <input hidden wire:model="rating" style="color: #fbe233;" type="radio" id="star2" name="rating" style="color: #fbe233;" value="2" />
                                        <svg class="cursor-pointer block w-8 h-8 @if($evaluation >= 2 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </label>
                                    <label for="star3">
                                        <input hidden wire:model="rating" style="color: #fbe233;" type="radio" id="star3" name="rating" style="color: #fbe233;" value="3" />
                                        <svg class="cursor-pointer block w-8 h-8 @if($evaluation >= 3 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </label>
                                    <label for="star4">
                                        <input hidden wire:model="rating" style="color: #fbe233;" type="radio" id="star4" name="rating" style="color: #fbe233;" value="4" />
                                        <svg class="cursor-pointer block w-8 h-8 @if($evaluation >= 4 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </label>
                                    <label for="star5">
                                        <input hidden wire:model="rating" style="color: #fbe233;" type="radio" id="star5" name="rating" style="color: #fbe233;" value="5" />
                                        <svg class="cursor-pointer block w-8 h-8 @if($evaluation >= 5 ) text-indigo-500 @else text-grey @endif " fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M10 15l-5.878 3.09 1.123-6.545L.489 6.91l6.572-.955L10 0l2.939 5.955 6.572.955-4.756 4.635 1.123 6.545z"/></svg>
                                    </label>
                                </div> --}}



                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@include('admin.footer')
